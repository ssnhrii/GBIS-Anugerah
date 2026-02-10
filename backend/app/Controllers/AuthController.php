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

    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('admin');
        }

        $data = ['currentPage' => 'login'];
        return view('layouts/header', $data)
             . view('pages/login', $data)
             . view('layouts/footer');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Validasi input
        if (empty($username) || empty($password)) {
            return redirect()->to('login')->with('error', 'Username dan password harus diisi');
        }

        // Verifikasi user
        $user = $this->userModel->verifyPassword($username, $password);

        if (!$user) {
            return redirect()->to('login')->with('error', 'Username atau password salah');
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

        return redirect()->to('admin')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        session()->destroy();
        $this->response->deleteCookie('remember_token');
        return redirect()->to(base_url());
    }
}
