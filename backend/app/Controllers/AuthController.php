<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('pages/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Validasi input
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan password harus diisi');
        }

        // Verifikasi user
        $user = $this->userModel->verifyPassword($username, $password);

        if (!$user) {
            return redirect()->back()->with('error', 'Username atau password salah');
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

        return redirect()->to('/dashboard')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        session()->destroy();
        $this->response->deleteCookie('remember_token');
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }

    public function register()
    {
        return view('pages/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => 'user',
            'is_active' => 1
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        return redirect()->back()->withInput()->with('error', 'Registrasi gagal. Silakan coba lagi.');
    }
}
