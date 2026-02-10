<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;
    private $maxLoginAttempts = 5; // Maksimal percobaan login
    private $lockoutTime = 900; // 15 menit dalam detik

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url', 'content']);
    }

    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/index.php'));
        }

        $data = [
            'currentPage' => 'login',
            'siteSettings' => get_all_site_settings(),
            'isLocked' => false,
            'remainingTime' => 0,
            'loginAttempts' => $this->getLoginAttempts()
        ];

        // Check if account is locked
        if ($this->isAccountLocked()) {
            $remainingTime = $this->getRemainingLockoutTime();
            $minutes = ceil($remainingTime / 60);
            
            $data['isLocked'] = true;
            $data['remainingTime'] = $remainingTime;
            
            session()->setFlashdata('error', "Akun terkunci karena terlalu banyak percobaan login gagal. Silakan coba lagi dalam {$minutes} menit.");
        }
        
        return view('layouts/header', $data)
             . view('pages/login', $data)
             . view('layouts/footer');
    }

    public function login()
    {
        // Check if account is locked
        if ($this->isAccountLocked()) {
            $remainingTime = $this->getRemainingLockoutTime();
            $minutes = ceil($remainingTime / 60);
            return redirect()->to('login')->with('error', "Akun terkunci. Silakan coba lagi dalam {$minutes} menit.");
        }

        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->to('login')->with('error', 'Token keamanan tidak valid. Silakan refresh halaman.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Validasi input - Sanitasi untuk mencegah injection
        $username = strip_tags(trim($username));
        $password = trim($password);

        // Validasi panjang karakter
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'min_length' => 'Username minimal 3 karakter',
                    'max_length' => 'Username maksimal 50 karakter',
                    'alpha_numeric_punct' => 'Username hanya boleh huruf, angka, dan underscore'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[100]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 6 karakter',
                    'max_length' => 'Password terlalu panjang'
                ]
            ]
        ]);

        if (!$validation->run(['username' => $username, 'password' => $password])) {
            $errors = $validation->getErrors();
            $errorMessage = implode(', ', $errors);
            return redirect()->to('login')->with('error', $errorMessage);
        }

        // Verifikasi user
        $user = $this->userModel->verifyPassword($username, $password);

        if (!$user) {
            // Increment login attempts
            $this->incrementLoginAttempts();
            
            $attempts = $this->getLoginAttempts();
            $remaining = $this->maxLoginAttempts - $attempts;
            
            if ($remaining > 0) {
                return redirect()->to('login')->with('error', "Username atau password salah. Sisa percobaan: {$remaining}");
            } else {
                // Lock account
                $this->lockAccount();
                return redirect()->to('login')->with('error', "Terlalu banyak percobaan login gagal. Akun terkunci selama 15 menit.");
            }
        }

        // Reset login attempts on successful login
        $this->resetLoginAttempts();

        // Set session
        $sessionData = [
            'id'         => $user['id'],
            'username'   => $user['username'],
            'email'      => $user['email'] ?? '',
            'full_name'  => $user['full_name'] ?? $user['username'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
            'login_time' => time(),
            'ip_address' => $this->request->getIPAddress(),
            'user_agent' => $this->request->getUserAgent()->getAgentString()
        ];

        session()->set($sessionData);

        // Set remember me cookie jika dicentang
        if ($remember == '1') {
            // Generate secure token
            $token = bin2hex(random_bytes(32));
            
            // Save token to database (optional - untuk keamanan lebih baik)
            // $this->userModel->saveRememberToken($user['id'], $token);
            
            // Set cookie untuk 30 hari
            $this->response->setCookie([
                'name'   => 'remember_token',
                'value'  => $token,
                'expire' => 60 * 60 * 24 * 30, // 30 hari
                'secure' => true, // Hanya HTTPS
                'httponly' => true, // Tidak bisa diakses JavaScript
                'samesite' => 'Strict' // CSRF protection
            ]);
            
            $this->response->setCookie([
                'name'   => 'remember_user',
                'value'  => $user['id'],
                'expire' => 60 * 60 * 24 * 30,
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]);
        }

        // Log aktivitas login (optional)
        log_message('info', "User {$username} logged in from IP: " . $this->request->getIPAddress());

        return redirect()->to(base_url('admin/index.php'))->with('success', 'Login berhasil! Selamat datang, ' . ($user['full_name'] ?? $user['username']));
    }

    public function logout()
    {
        // Log aktivitas logout
        $username = session()->get('username');
        log_message('info', "User {$username} logged out");

        // Destroy session
        session()->destroy();
        
        // Delete remember me cookies
        $this->response->deleteCookie('remember_token');
        $this->response->deleteCookie('remember_user');
        
        return redirect()->to(base_url())->with('success', 'Anda telah logout');
    }

    /**
     * Check if account is locked due to too many failed attempts
     */
    private function isAccountLocked(): bool
    {
        $lockoutTime = session()->get('lockout_time');
        
        if ($lockoutTime && time() < $lockoutTime) {
            return true;
        }
        
        // Reset if lockout time has passed
        if ($lockoutTime && time() >= $lockoutTime) {
            $this->resetLoginAttempts();
        }
        
        return false;
    }

    /**
     * Get remaining lockout time in seconds
     */
    private function getRemainingLockoutTime(): int
    {
        $lockoutTime = session()->get('lockout_time');
        
        if ($lockoutTime) {
            return max(0, $lockoutTime - time());
        }
        
        return 0;
    }

    /**
     * Increment login attempts
     */
    private function incrementLoginAttempts(): void
    {
        $attempts = session()->get('login_attempts') ?? 0;
        session()->set('login_attempts', $attempts + 1);
    }

    /**
     * Get current login attempts
     */
    private function getLoginAttempts(): int
    {
        return session()->get('login_attempts') ?? 0;
    }

    /**
     * Lock account for specified time
     */
    private function lockAccount(): void
    {
        session()->set('lockout_time', time() + $this->lockoutTime);
        
        // Log security event
        log_message('warning', "Account locked due to too many failed login attempts from IP: " . $this->request->getIPAddress());
    }

    /**
     * Reset login attempts
     */
    private function resetLoginAttempts(): void
    {
        session()->remove('login_attempts');
        session()->remove('lockout_time');
    }
}
