<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index(): string
    {
        // Get page parameter from URL
        $page = $this->request->getGet('page') ?? 'home';
        
        // Sanitize page name
        $page = preg_replace('/[^a-z0-9\-]/', '', strtolower($page));
        
        // Define page titles
        $titles = [
            'home' => 'GBIS Anugerah',
            'jemaat-total' => 'GBIS Anugerah',
            'jemaat-bapak' => 'GBIS Anugerah',
            'jemaat-ibu' => 'GBIS Anugerah',
            'jemaat-pemuda' => 'GBIS Anugerah',
            'jemaat-anak' => 'GBIS Anugerah',
            'kegiatan-total' => 'GBIS Anugerah',
            'kegiatan-bapak' => 'GBIS Anugerah',
            'kegiatan-ibu' => 'GBIS Anugerah',
            'kegiatan-pemuda' => 'GBIS Anugerah',
            'kegiatan-anak' => 'GBIS Anugerah',
            'dokumentasi-total' => 'GBIS Anugerah',
            'dokumentasi-bapak' => 'GBIS Anugerah',
            'dokumentasi-ibu' => 'GBIS Anugerah',
            'dokumentasi-pemuda' => 'GBIS Anugerah',
            'dokumentasi-anak' => 'GBIS Anugerah',
            'firman' => 'GBIS Anugerah',
            'login' => 'GBIS Anugerah',
            'dashboard' => 'Dashboard - GBIS Anugerah',
        ];
        
        // Set title
        $data['title'] = $titles[$page] ?? 'GBIS Anugerah';
        $data['currentPage'] = $page;
        
        // Check if page view exists
        $pageView = APPPATH . 'Views/pages/' . $page . '.php';
        if (!file_exists($pageView)) {
            $page = 'home';
        }
        
        // Special handling for login page (standalone)
        if ($page === 'login') {
            // Jika sudah login, redirect ke dashboard
            if (session()->get('isLoggedIn')) {
                return redirect()->to('/?page=dashboard')->send();
            }
            return view('pages/login');
        }

        // Special handling for dashboard (requires login)
        if ($page === 'dashboard') {
            if (!session()->get('isLoggedIn')) {
                return redirect()->to('/?page=login')->with('error', 'Silakan login terlebih dahulu')->send();
            }
            $data['username'] = session()->get('username');
            $data['role'] = session()->get('role');
            
            $output = view('layouts/header', $data);
            $output .= view('pages/dashboard', $data);
            $output .= view('layouts/footer');
            return $output;
        }
        
        // Load views
        $output = view('layouts/header', $data);
        $output .= view('pages/' . $page);
        $output .= view('layouts/footer');
        
        return $output;
    }

    public function login()
    {
        // Handle POST request for login
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember');

            // Validasi input
            if (empty($username) || empty($password)) {
                return redirect()->to('/?page=login')->with('error', 'Username dan password harus diisi');
            }

            // Verifikasi user
            $user = $this->userModel->verifyPassword($username, $password);

            if (!$user) {
                return redirect()->to('/?page=login')->with('error', 'Username atau password salah');
            }

            // Set session
            $sessionData = [
                'id'         => $user['id'],
                'username'   => $user['username'],
                'email'      => $user['email'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ];

            session()->set($sessionData);

            // Set remember me cookie jika dicentang
            if ($remember) {
                $this->response->setCookie('remember_token', $user['id'], 60 * 60 * 24 * 30); // 30 hari
            }

            return redirect()->to('/?page=dashboard')->with('success', 'Login berhasil!');
        }

        // GET request - show login form
        return redirect()->to('/?page=login');
    }

    public function logout()
    {
        session()->destroy();
        $this->response->deleteCookie('remember_token');
        return redirect()->to('/?page=login')->with('success', 'Logout berhasil');
    }
}
