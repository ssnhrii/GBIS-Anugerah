<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(['url']);
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/index.php?page=login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek apakah user adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        $data = [
            'title' => 'Dashboard Admin - GBIS Anugerah',
            'currentPage' => 'dashboard',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
             . view('admin/dashboard', $data)
             . view('admin/layouts/footer');
    }

    public function jemaat()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/index.php?page=login');
        }

        $data = [
            'title' => 'Kelola Jemaat - Admin GBIS',
            'currentPage' => 'jemaat',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
             . view('admin/jemaat', $data)
             . view('admin/layouts/footer');
    }

    public function kegiatan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/index.php?page=login');
        }

        $data = [
            'title' => 'Kelola Kegiatan - Admin GBIS',
            'currentPage' => 'kegiatan',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
             . view('admin/kegiatan', $data)
             . view('admin/layouts/footer');
    }

    public function dokumentasi()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/index.php?page=login');
        }

        $data = [
            'title' => 'Kelola Dokumentasi - Admin GBIS',
            'currentPage' => 'dokumentasi',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
             . view('admin/dokumentasi', $data)
             . view('admin/layouts/footer');
    }

    public function firman()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/index.php?page=login');
        }

        $data = [
            'title' => 'Kelola Firman - Admin GBIS',
            'currentPage' => 'firman',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
             . view('admin/firman', $data)
             . view('admin/layouts/footer');
    }
}
