<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek apakah user adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        // Load model
        $jemaatModel = new \App\Models\JemaatModel();
        $kegiatanModel = new \App\Models\KegiatanModel();
        $dokumentasiModel = new \App\Models\DokumentasiModel();
        $firmanModel = new \App\Models\FirmanModel();

        // Get statistics
        $totalJemaat = $jemaatModel->getTotalJemaat();
        $jemaatByKategori = $jemaatModel->countByKategori();
        $totalKegiatan = $kegiatanModel->getTotalKegiatan();
        $kegiatanAkanDatang = $kegiatanModel->getKegiatanAkanDatang();
        $totalDokumentasi = $dokumentasiModel->getTotalDokumentasi();
        $totalFirman = $firmanModel->getTotalFirman();

        $data = [
            'title' => 'Dashboard Admin - GBIS Anugerah',
            'currentPage' => 'dashboard',
            'active_menu' => 'dashboard',
            'user_name' => session()->get('username'),
            'user_role' => session()->get('role'),
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'total_jemaat' => $totalJemaat,
            'jemaatByKategori' => $jemaatByKategori,
            'total_kegiatan' => $totalKegiatan,
            'kegiatanAkanDatang' => $kegiatanAkanDatang,
            'total_dokumentasi' => $totalDokumentasi,
            'total_firman' => $totalFirman,
            'recent_jemaat' => $jemaatModel->orderBy('id', 'DESC')->limit(5)->findAll(),
            'recent_kegiatan' => $kegiatanModel->orderBy('id', 'DESC')->limit(5)->findAll(),
            'recent_dokumentasi' => $dokumentasiModel->orderBy('id', 'DESC')->limit(6)->findAll()
        ];

        return view('admin/pages/dashboard', $data);
    }

    public function jemaat()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();
        
        // Get all jemaat with pagination
        $perPage = 10;
        $jemaatList = $jemaatModel->where('status_aktif', 1)
                                   ->orderBy('nama_lengkap', 'ASC')
                                   ->paginate($perPage);
        
        $data = [
            'title' => 'Kelola Jemaat - Admin GBIS',
            'currentPage' => 'jemaat',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'jemaatList' => $jemaatList,
            'pager' => $jemaatModel->pager
        ];

        return view('admin/layouts/header', $data)
            . view('admin/jemaat/index', $data)
            . view('admin/layouts/footer');
    }

    public function jemaatTambah()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Jemaat - Admin GBIS',
            'currentPage' => 'jemaat',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
            . view('admin/jemaat/tambah', $data)
            . view('admin/layouts/footer');
    }

    public function jemaatSimpan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();

        // Validasi input
        $rules = [
            'nama_lengkap' => 'required|min_length[3]|max_length[255]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak]',
            'email' => 'permit_empty|valid_email',
            'nomor_telepon' => 'permit_empty|numeric|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir') ?: null,
            'tempat_lahir' => $this->request->getPost('tempat_lahir') ?: null,
            'alamat' => $this->request->getPost('alamat') ?: null,
            'nomor_telepon' => $this->request->getPost('nomor_telepon') ?: null,
            'email' => $this->request->getPost('email') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan') ?: null,
            'pekerjaan' => $this->request->getPost('pekerjaan') ?: null,
            'tanggal_baptis' => $this->request->getPost('tanggal_baptis') ?: null,
            'tanggal_sidi' => $this->request->getPost('tanggal_sidi') ?: null,
            'status_aktif' => 1
        ];

        if ($jemaatModel->insert($data)) {
            return redirect()->to('/admin/jemaat')->with('success', 'Data jemaat berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data jemaat');
        }
    }

    public function jemaatEdit($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();
        $jemaat = $jemaatModel->find($id);

        if (!$jemaat) {
            return redirect()->to('/admin/jemaat')->with('error', 'Data jemaat tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Jemaat - Admin GBIS',
            'currentPage' => 'jemaat',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'jemaat' => $jemaat
        ];

        return view('admin/layouts/header', $data)
            . view('admin/jemaat/edit', $data)
            . view('admin/layouts/footer');
    }

    public function jemaatUpdate($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();

        // Validasi input
        $rules = [
            'nama_lengkap' => 'required|min_length[3]|max_length[255]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak]',
            'email' => 'permit_empty|valid_email',
            'nomor_telepon' => 'permit_empty|numeric|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir') ?: null,
            'tempat_lahir' => $this->request->getPost('tempat_lahir') ?: null,
            'alamat' => $this->request->getPost('alamat') ?: null,
            'nomor_telepon' => $this->request->getPost('nomor_telepon') ?: null,
            'email' => $this->request->getPost('email') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan') ?: null,
            'pekerjaan' => $this->request->getPost('pekerjaan') ?: null,
            'tanggal_baptis' => $this->request->getPost('tanggal_baptis') ?: null,
            'tanggal_sidi' => $this->request->getPost('tanggal_sidi') ?: null,
        ];

        if ($jemaatModel->update($id, $data)) {
            return redirect()->to('/admin/jemaat')->with('success', 'Data jemaat berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data jemaat');
        }
    }

    public function jemaatHapus($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();

        // Soft delete (set status_aktif = 0)
        if ($jemaatModel->update($id, ['status_aktif' => 0])) {
            return redirect()->to('/admin/jemaat')->with('success', 'Data jemaat berhasil dihapus');
        } else {
            return redirect()->to('/admin/jemaat')->with('error', 'Gagal menghapus data jemaat');
        }
    }

    public function kegiatan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();
        
        // Get all kegiatan with pagination
        $perPage = 10;
        $kegiatanList = $kegiatanModel->where('status_aktif', 1)
                                       ->orderBy('tanggal_kegiatan', 'DESC')
                                       ->paginate($perPage);
        
        $data = [
            'title' => 'Kelola Kegiatan - Admin GBIS',
            'currentPage' => 'kegiatan',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'kegiatanList' => $kegiatanList,
            'pager' => $kegiatanModel->pager
        ];

        return view('admin/layouts/header', $data)
            . view('admin/kegiatan/index', $data)
            . view('admin/layouts/footer');
    }

    public function kegiatanTambah()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Kegiatan - Admin GBIS',
            'currentPage' => 'kegiatan',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
            . view('admin/kegiatan/tambah', $data)
            . view('admin/layouts/footer');
    }

    public function kegiatanSimpan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();

        // Validasi input
        $rules = [
            'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
            'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum]',
            'tanggal_kegiatan' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $data = [
            'judul_kegiatan' => $this->request->getPost('judul_kegiatan'),
            'deskripsi' => $this->request->getPost('deskripsi') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai') ?: null,
            'waktu_selesai' => $this->request->getPost('waktu_selesai') ?: null,
            'lokasi' => $this->request->getPost('lokasi') ?: null,
            'pembicara' => $this->request->getPost('pembicara') ?: null,
            'jumlah_peserta' => $this->request->getPost('jumlah_peserta') ?: 0,
            'status' => $this->request->getPost('status') ?: 'Akan Datang',
            'status_aktif' => 1
        ];

        if ($kegiatanModel->insert($data)) {
            return redirect()->to('/admin/kegiatan')->with('success', 'Data kegiatan berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data kegiatan');
        }
    }

    public function kegiatanEdit($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();
        $kegiatan = $kegiatanModel->find($id);

        if (!$kegiatan) {
            return redirect()->to('/admin/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Kegiatan - Admin GBIS',
            'currentPage' => 'kegiatan',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'kegiatan' => $kegiatan
        ];

        return view('admin/layouts/header', $data)
            . view('admin/kegiatan/edit', $data)
            . view('admin/layouts/footer');
    }

    public function kegiatanUpdate($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();

        // Validasi input
        $rules = [
            'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
            'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum]',
            'tanggal_kegiatan' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $data = [
            'judul_kegiatan' => $this->request->getPost('judul_kegiatan'),
            'deskripsi' => $this->request->getPost('deskripsi') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai') ?: null,
            'waktu_selesai' => $this->request->getPost('waktu_selesai') ?: null,
            'lokasi' => $this->request->getPost('lokasi') ?: null,
            'pembicara' => $this->request->getPost('pembicara') ?: null,
            'jumlah_peserta' => $this->request->getPost('jumlah_peserta') ?: 0,
            'status' => $this->request->getPost('status') ?: 'Akan Datang',
        ];

        if ($kegiatanModel->update($id, $data)) {
            return redirect()->to('/admin/kegiatan')->with('success', 'Data kegiatan berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data kegiatan');
        }
    }

    public function kegiatanHapus($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();

        // Soft delete (set status_aktif = 0)
        if ($kegiatanModel->update($id, ['status_aktif' => 0])) {
            return redirect()->to('/admin/kegiatan')->with('success', 'Data kegiatan berhasil dihapus');
        } else {
            return redirect()->to('/admin/kegiatan')->with('error', 'Gagal menghapus data kegiatan');
        }
    }

    public function dokumentasi()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $dokumentasiModel = new \App\Models\DokumentasiModel();
        
        // Get all dokumentasi with pagination
        $perPage = 12;
        $dokumentasiList = $dokumentasiModel->where('status_aktif', 1)
                                             ->orderBy('created_at', 'DESC')
                                             ->paginate($perPage);
        
        $data = [
            'title' => 'Kelola Dokumentasi - Admin GBIS',
            'currentPage' => 'dokumentasi',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'dokumentasiList' => $dokumentasiList,
            'pager' => $dokumentasiModel->pager
        ];

        return view('admin/layouts/header', $data)
            . view('admin/dokumentasi/index', $data)
            . view('admin/layouts/footer');
    }

    public function dokumentasiTambah()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Dokumentasi - Admin GBIS',
            'currentPage' => 'dokumentasi',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
            . view('admin/dokumentasi/tambah', $data)
            . view('admin/layouts/footer');
    }

    public function dokumentasiSimpan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $dokumentasiModel = new \App\Models\DokumentasiModel();

        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'kategori' => 'required|in_list[Foto,Video]',
            'jenis_kegiatan' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum,Ibadah,Lainnya]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $filePath = '';
        $fileType = '';
        $fileSize = 0;
        $uploadMethod = $this->request->getPost('upload_method');

        if ($uploadMethod === 'file') {
            $file = $this->request->getFile('file_upload');
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Validasi file
                $kategori = $this->request->getPost('kategori');
                $maxSize = ($kategori === 'Foto') ? 5 * 1024 * 1024 : 50 * 1024 * 1024; // 5MB untuk foto, 50MB untuk video
                
                if ($file->getSize() > $maxSize) {
                    $maxSizeMB = $maxSize / 1024 / 1024;
                    return redirect()->back()->withInput()->with('error', "Ukuran file terlalu besar. Maksimal {$maxSizeMB}MB");
                }
                
                // Generate unique filename
                $newName = $file->getRandomName();
                
                // Tentukan folder berdasarkan kategori
                $folder = ($kategori === 'Foto') ? 'foto' : 'video';
                $uploadPath = FCPATH . 'uploads/dokumentasi/' . $folder;
                
                // Buat folder jika belum ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                // Upload file
                if ($file->move($uploadPath, $newName)) {
                    $filePath = 'uploads/dokumentasi/' . $folder . '/' . $newName;
                    $fileType = $file->getClientMimeType();
                    $fileSize = $file->getSize();
                } else {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload file');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'File tidak valid atau belum dipilih');
            }
        } else {
            // URL method
            $filePath = $this->request->getPost('file_path');
            if (empty($filePath)) {
                return redirect()->back()->withInput()->with('error', 'URL file harus diisi');
            }
        }

        // Simpan data
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'file_path' => $filePath,
            'file_type' => $fileType ?: null,
            'file_size' => $fileSize ?: null,
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan') ?: null,
            'fotografer' => $this->request->getPost('fotografer') ?: null,
            'jumlah_views' => 0,
            'status_aktif' => 1
        ];

        if ($dokumentasiModel->insert($data)) {
            return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan dokumentasi');
        }
    }

    public function dokumentasiEdit($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $dokumentasiModel = new \App\Models\DokumentasiModel();
        $dokumentasi = $dokumentasiModel->find($id);

        if (!$dokumentasi) {
            return redirect()->to('/admin/dokumentasi')->with('error', 'Dokumentasi tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Dokumentasi - Admin GBIS',
            'currentPage' => 'dokumentasi',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'dokumentasi' => $dokumentasi
        ];

        return view('admin/layouts/header', $data)
            . view('admin/dokumentasi/edit', $data)
            . view('admin/layouts/footer');
    }

    public function dokumentasiUpdate($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $dokumentasiModel = new \App\Models\DokumentasiModel();

        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'kategori' => 'required|in_list[Foto,Video]',
            'jenis_kegiatan' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum,Ibadah,Lainnya]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi') ?: null,
            'kategori' => $this->request->getPost('kategori'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan') ?: null,
            'fotografer' => $this->request->getPost('fotografer') ?: null,
        ];

        // Handle file upload jika ada
        $uploadMethod = $this->request->getPost('upload_method');

        if ($uploadMethod === 'file') {
            $file = $this->request->getFile('file_upload');
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Validasi file
                $kategori = $this->request->getPost('kategori');
                $maxSize = ($kategori === 'Foto') ? 5 * 1024 * 1024 : 50 * 1024 * 1024;
                
                if ($file->getSize() > $maxSize) {
                    $maxSizeMB = $maxSize / 1024 / 1024;
                    return redirect()->back()->withInput()->with('error', "Ukuran file terlalu besar. Maksimal {$maxSizeMB}MB");
                }
                
                // Hapus file lama jika ada
                $oldData = $dokumentasiModel->find($id);
                if ($oldData && !empty($oldData['file_path']) && file_exists(FCPATH . $oldData['file_path'])) {
                    @unlink(FCPATH . $oldData['file_path']);
                }
                
                // Generate unique filename
                $newName = $file->getRandomName();
                
                // Tentukan folder berdasarkan kategori
                $folder = ($kategori === 'Foto') ? 'foto' : 'video';
                $uploadPath = FCPATH . 'uploads/dokumentasi/' . $folder;
                
                // Buat folder jika belum ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                // Upload file
                if ($file->move($uploadPath, $newName)) {
                    $data['file_path'] = 'uploads/dokumentasi/' . $folder . '/' . $newName;
                    $data['file_type'] = $file->getClientMimeType();
                    $data['file_size'] = $file->getSize();
                } else {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload file');
                }
            }
        } elseif ($uploadMethod === 'url') {
            // URL method
            $filePath = $this->request->getPost('file_path');
            if (!empty($filePath)) {
                $data['file_path'] = $filePath;
                $data['file_type'] = null;
                $data['file_size'] = null;
            }
        }
        // Jika 'keep', tidak update file_path

        if ($dokumentasiModel->update($id, $data)) {
            return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui dokumentasi');
        }
    }

    public function dokumentasiHapus($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $dokumentasiModel = new \App\Models\DokumentasiModel();

        // Soft delete (set status_aktif = 0)
        if ($dokumentasiModel->update($id, ['status_aktif' => 0])) {
            return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil dihapus');
        } else {
            return redirect()->to('/admin/dokumentasi')->with('error', 'Gagal menghapus dokumentasi');
        }
    }

    public function firman()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $firmanModel = new \App\Models\FirmanModel();
        
        // Get all firman with pagination
        $perPage = 10;
        $firmanList = $firmanModel->where('status_aktif', 1)
                                   ->orderBy('tanggal_publikasi', 'DESC')
                                   ->paginate($perPage);
        
        $data = [
            'title' => 'Kelola Firman - Admin GBIS',
            'currentPage' => 'firman',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'firmanList' => $firmanList,
            'pager' => $firmanModel->pager
        ];

        return view('admin/layouts/header', $data)
            . view('admin/firman/index', $data)
            . view('admin/layouts/footer');
    }

    public function firmanTambah()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Firman - Admin GBIS',
            'currentPage' => 'firman',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('admin/layouts/header', $data)
            . view('admin/firman/tambah', $data)
            . view('admin/layouts/footer');
    }

    public function firmanSimpan()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $firmanModel = new \App\Models\FirmanModel();

        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'isi_renungan' => 'required',
            'tanggal_publikasi' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $data = [
            'judul' => $this->request->getPost('judul'),
            'ayat_alkitab' => $this->request->getPost('ayat_alkitab') ?: null,
            'isi_ayat' => $this->request->getPost('isi_ayat') ?: null,
            'isi_renungan' => $this->request->getPost('isi_renungan'),
            'penulis' => $this->request->getPost('penulis') ?: null,
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
            'kategori' => $this->request->getPost('kategori') ?: 'Renungan Harian',
            'gambar_cover' => $this->request->getPost('gambar_cover') ?: null,
            'status' => $this->request->getPost('status') ?: 'Draft',
            'jumlah_views' => 0,
            'status_aktif' => 1
        ];

        if ($firmanModel->insert($data)) {
            return redirect()->to('/admin/firman')->with('success', 'Firman berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan firman');
        }
    }

    public function firmanEdit($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $firmanModel = new \App\Models\FirmanModel();
        $firman = $firmanModel->find($id);

        if (!$firman) {
            return redirect()->to('/admin/firman')->with('error', 'Firman tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Firman - Admin GBIS',
            'currentPage' => 'firman',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'firman' => $firman
        ];

        return view('admin/layouts/header', $data)
            . view('admin/firman/edit', $data)
            . view('admin/layouts/footer');
    }

    public function firmanUpdate($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $firmanModel = new \App\Models\FirmanModel();

        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'isi_renungan' => 'required',
            'tanggal_publikasi' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $data = [
            'judul' => $this->request->getPost('judul'),
            'ayat_alkitab' => $this->request->getPost('ayat_alkitab') ?: null,
            'isi_ayat' => $this->request->getPost('isi_ayat') ?: null,
            'isi_renungan' => $this->request->getPost('isi_renungan'),
            'penulis' => $this->request->getPost('penulis') ?: null,
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
            'kategori' => $this->request->getPost('kategori') ?: 'Renungan Harian',
            'gambar_cover' => $this->request->getPost('gambar_cover') ?: null,
            'status' => $this->request->getPost('status') ?: 'Draft',
        ];

        if ($firmanModel->update($id, $data)) {
            return redirect()->to('/admin/firman')->with('success', 'Firman berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui firman');
        }
    }

    public function firmanHapus($id)
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $firmanModel = new \App\Models\FirmanModel();

        // Soft delete (set status_aktif = 0)
        if ($firmanModel->update($id, ['status_aktif' => 0])) {
            return redirect()->to('/admin/firman')->with('success', 'Firman berhasil dihapus');
        } else {
            return redirect()->to('/admin/firman')->with('error', 'Gagal menghapus firman');
        }
    }

    public function profile()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'My Profile - Admin GBIS',
            'currentPage' => 'profile',
            'username' => session()->get('username'),
            'user_name' => session()->get('username'),
            'user_role' => session()->get('role'),
            'role' => session()->get('role'),
            'email' => session()->get('email') ?? ''
        ];

        return view('admin/layouts/header', $data)
            . view('admin/pages/profile', $data)
            . view('admin/layouts/footer');
    }

    public function profileUpdate()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'permit_empty|valid_email',
        ];

        // Jika password diisi, tambahkan validasi password
        if ($this->request->getPost('new_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[new_password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update session data
        session()->set([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/admin/profile')->with('success', 'Profile berhasil diperbarui');
    }

    public function settings()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Settings - Admin GBIS',
            'currentPage' => 'settings',
            'username' => session()->get('username'),
            'user_name' => session()->get('username'),
            'user_role' => session()->get('role'),
            'role' => session()->get('role'),
            'email_notifications' => session()->get('email_notifications') ?? true,
            'new_jemaat' => session()->get('new_jemaat') ?? true,
            'new_kegiatan' => session()->get('new_kegiatan') ?? true,
            'two_factor' => session()->get('two_factor') ?? false,
            'session_timeout' => session()->get('session_timeout') ?? 30,
            'items_per_page' => session()->get('items_per_page') ?? 10,
            'date_format' => session()->get('date_format') ?? 'd/m/Y'
        ];

        return view('admin/layouts/header', $data)
            . view('admin/pages/settings', $data)
            . view('admin/layouts/footer');
    }

    public function settingsUpdate()
    {
        // Cek login dan role
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $action = $this->request->getGet('action');

        switch ($action) {
            case 'notifications':
                session()->set([
                    'email_notifications' => $this->request->getPost('email_notifications') ? true : false,
                    'new_jemaat' => $this->request->getPost('new_jemaat') ? true : false,
                    'new_kegiatan' => $this->request->getPost('new_kegiatan') ? true : false
                ]);
                $message = 'Notification preferences updated successfully';
                break;

            case 'security':
                session()->set([
                    'two_factor' => $this->request->getPost('two_factor') ? true : false,
                    'session_timeout' => $this->request->getPost('session_timeout')
                ]);
                $message = 'Security settings updated successfully';
                break;

            case 'display':
                session()->set([
                    'items_per_page' => $this->request->getPost('items_per_page'),
                    'date_format' => $this->request->getPost('date_format')
                ]);
                $message = 'Display settings updated successfully';
                break;

            default:
                return redirect()->to('/admin/settings')->with('error', 'Invalid action');
        }

        return redirect()->to('/admin/settings')->with('success', $message);
    }

    /**
     * Handle POST requests from parameter-based URLs
     * Routes POST requests to appropriate methods based on 'page' parameter
     */
    public function handlePost()
    {
        $page = $this->request->getGet('page') ?? '';
        $action = $this->request->getGet('action') ?? '';

        // Route berdasarkan page parameter
        switch ($page) {
            // Jemaat
            case 'jemaat-simpan':
                return $this->jemaatSimpan();
            case 'jemaat-update':
                $id = $this->request->getGet('id');
                return $this->jemaatUpdate($id);
            
            // Kegiatan
            case 'kegiatan-simpan':
                return $this->kegiatanSimpan();
            case 'kegiatan-update':
                $id = $this->request->getGet('id');
                return $this->kegiatanUpdate($id);
            
            // Dokumentasi
            case 'dokumentasi-simpan':
                return $this->dokumentasiSimpan();
            case 'dokumentasi-update':
                $id = $this->request->getGet('id');
                return $this->dokumentasiUpdate($id);
            
            // Firman
            case 'firman-simpan':
                return $this->firmanSimpan();
            case 'firman-update':
                $id = $this->request->getGet('id');
                return $this->firmanUpdate($id);
            
            // Profile & Settings
            case 'profile-update':
                return $this->profileUpdate();
            case 'settings-update':
                return $this->settingsUpdate();
            
            default:
                return redirect()->to('/admin')->with('error', 'Invalid action');
        }
    }

    /**
     * View detail jemaat
     */
    public function jemaatView($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $jemaatModel = new \App\Models\JemaatModel();
        $jemaat = $jemaatModel->find($id);

        if (!$jemaat) {
            return redirect()->to('/admin/index.php?page=jemaat-list')->with('error', 'Data jemaat tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Jemaat - Admin GBIS',
            'currentPage' => 'jemaat',
            'active_menu' => 'jemaat',
            'user_name' => session()->get('username'),
            'user_role' => session()->get('role'),
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'jemaat' => $jemaat
        ];

        return view('admin/pages/jemaat/view', $data);
    }

    /**
     * View detail kegiatan
     */
    public function kegiatanView($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $kegiatanModel = new \App\Models\KegiatanModel();
        $kegiatan = $kegiatanModel->find($id);

        if (!$kegiatan) {
            return redirect()->to('/admin/index.php?page=kegiatan-list')->with('error', 'Data kegiatan tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Kegiatan - Admin GBIS',
            'currentPage' => 'kegiatan',
            'active_menu' => 'kegiatan',
            'user_name' => session()->get('username'),
            'user_role' => session()->get('role'),
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'kegiatan' => $kegiatan
        ];

        return view('admin/pages/kegiatan/view', $data);
    }
}
