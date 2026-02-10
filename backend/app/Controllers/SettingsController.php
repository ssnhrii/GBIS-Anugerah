<?php

namespace App\Controllers;

use App\Models\PageContentModel;
use App\Models\SiteSettingModel;
use App\Models\UserModel;

class SettingsController extends BaseController
{
    protected $pageContentModel;
    protected $siteSettingModel;
    protected $userModel;

    public function __construct()
    {
        $this->pageContentModel = new PageContentModel();
        $this->siteSettingModel = new SiteSettingModel();
        $this->userModel = new UserModel();
    }

    // Halaman Konten
    public function pageList()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Kelola Konten Halaman',
            'active_menu' => 'pengaturan-konten',
            'pages' => $this->pageContentModel->getAllPages()
        ];

        return view('admin/settings/page_list', $data);
    }

    public function pageEdit($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if (!$id) {
            return redirect()->to('/admin/settings/pages')->with('error', 'ID tidak valid');
        }

        $page = $this->pageContentModel->find($id);
        if (!$page) {
            return redirect()->to('/admin/settings/pages')->with('error', 'Halaman tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'page_title' => 'required|min_length[3]',
                'content' => 'required',
            ];

            if ($this->validate($rules)) {
                $data = [
                    'page_title' => $this->request->getPost('page_title'),
                    'content' => $this->request->getPost('content'),
                    'meta_description' => $this->request->getPost('meta_description'),
                    'is_active' => $this->request->getPost('is_active') ? 1 : 0,
                ];

                if ($this->pageContentModel->update($id, $data)) {
                    return redirect()->to('/admin/settings/pages')->with('success', 'Konten berhasil diperbarui');
                } else {
                    return redirect()->back()->with('error', 'Gagal memperbarui konten');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        $data = [
            'title' => 'Edit Konten: ' . $page['page_title'],
            'active_menu' => 'pengaturan-konten',
            'page' => $page
        ];

        return view('admin/settings/page_edit', $data);
    }

    // Informasi Situs
    public function siteInfo()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $settings = $this->siteSettingModel->getAllSettings();
            
            foreach ($settings as $setting) {
                $value = $this->request->getPost($setting['setting_key']);
                if ($value !== null) {
                    $this->siteSettingModel->updateValue($setting['setting_key'], $value);
                }
            }

            return redirect()->to('/admin/settings/site-info')->with('success', 'Informasi situs berhasil diperbarui');
        }

        $data = [
            'title' => 'Informasi Situs',
            'active_menu' => 'pengaturan-info',
            'settings' => $this->siteSettingModel->getAllSettings()
        ];

        return view('admin/settings/site_info', $data);
    }

    // Kelola Admin
    public function adminList()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Kelola Admin',
            'active_menu' => 'pengaturan-admin',
            'admins' => $this->userModel->findAll()
        ];

        return view('admin/settings/admin_list', $data);
    }

    public function adminAdd()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]|is_unique[users.username]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]',
                'full_name' => 'required',
            ];

            if ($this->validate($rules)) {
                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'full_name' => $this->request->getPost('full_name'),
                    'role' => $this->request->getPost('role') ?? 'admin',
                ];

                if ($this->userModel->insert($data)) {
                    return redirect()->to('/admin/settings/admins')->with('success', 'Admin berhasil ditambahkan');
                } else {
                    return redirect()->back()->with('error', 'Gagal menambahkan admin');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        $data = [
            'title' => 'Tambah Admin',
            'active_menu' => 'pengaturan-admin'
        ];

        return view('admin/settings/admin_add', $data);
    }

    public function adminEdit($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if (!$id) {
            return redirect()->to('/admin/settings/admins')->with('error', 'ID tidak valid');
        }

        $admin = $this->userModel->find($id);
        if (!$admin) {
            return redirect()->to('/admin/settings/admins')->with('error', 'Admin tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => "required|min_length[3]|is_unique[users.username,id,{$id}]",
                'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
                'full_name' => 'required',
            ];

            if ($this->request->getPost('password')) {
                $rules['password'] = 'min_length[6]';
                $rules['confirm_password'] = 'matches[password]';
            }

            if ($this->validate($rules)) {
                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'full_name' => $this->request->getPost('full_name'),
                    'role' => $this->request->getPost('role') ?? 'admin',
                ];

                if ($this->request->getPost('password')) {
                    $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                }

                if ($this->userModel->update($id, $data)) {
                    return redirect()->to('/admin/settings/admins')->with('success', 'Admin berhasil diperbarui');
                } else {
                    return redirect()->back()->with('error', 'Gagal memperbarui admin');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        $data = [
            'title' => 'Edit Admin',
            'active_menu' => 'pengaturan-admin',
            'admin' => $admin
        ];

        return view('admin/settings/admin_edit', $data);
    }

    public function adminDelete($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if (!$id) {
            return redirect()->to('/admin/settings/admins')->with('error', 'ID tidak valid');
        }

        // Jangan hapus diri sendiri
        if ($id == session()->get('user_id')) {
            return redirect()->to('/admin/settings/admins')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        if ($this->userModel->delete($id)) {
            return redirect()->to('/admin/settings/admins')->with('success', 'Admin berhasil dihapus');
        } else {
            return redirect()->to('/admin/settings/admins')->with('error', 'Gagal menghapus admin');
        }
    }
}
