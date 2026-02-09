<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper(['url']);
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'title' => 'Dashboard - GBIS Anugerah',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('layouts/header', $data)
             . view('index', $data)
             . view('layouts/footer');
    }
}
