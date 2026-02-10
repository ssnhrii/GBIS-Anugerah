<?php

namespace App\Controllers;

class GbisController extends BaseController
{
    public function index()
    {
        // Load content helper
        helper('content');
        
        // Get page parameter from URL
        $page = $this->request->getGet('page') ?? 'home';
        
        // Sanitize page name
        $page = preg_replace('/[^a-z0-9\-]/', '', strtolower($page));
        
        // Load page content from database
        $pageContent = get_page_content($page);
        
        $data = [
            'currentPage' => $page,
            'pageContent' => $pageContent,
            'siteSettings' => get_all_site_settings()
        ];
        
        // Load jemaat data for jemaat pages
        if (strpos($page, 'jemaat') !== false) {
            $jemaatModel = new \App\Models\JemaatModel();
            
            // Determine kategori based on page
            $kategoriMap = [
                'jemaat-bapak' => 'Kaum Bapak',
                'jemaat-ibu' => 'Kaum Ibu',
                'jemaat-pemuda' => 'Pemuda',
                'jemaat-anak' => 'Anak-anak',
            ];
            
            if ($page === 'jemaat') {
                // All jemaat
                $data['jemaatList'] = $jemaatModel->where('status_aktif', 1)
                                                   ->orderBy('kategori', 'ASC')
                                                   ->orderBy('nama_lengkap', 'ASC')
                                                   ->findAll();
                $data['totalJemaat'] = count($data['jemaatList']);
            } elseif (isset($kategoriMap[$page])) {
                // Specific kategori
                $kategori = $kategoriMap[$page];
                $data['jemaatList'] = $jemaatModel->getJemaatByKategori($kategori);
                $data['kategori'] = $kategori;
                $data['totalJemaat'] = count($data['jemaatList']);
            }
        }
        
        // Load kegiatan data for kegiatan page
        if ($page === 'kegiatan') {
            $kegiatanModel = new \App\Models\KegiatanModel();
            $data['kegiatanList'] = $kegiatanModel->where('status_aktif', 1)
                                                   ->orderBy('tanggal_kegiatan', 'DESC')
                                                   ->findAll();
            $data['kegiatanAkanDatang'] = $kegiatanModel->getKegiatanAkanDatang();
            $data['kegiatanSelesai'] = $kegiatanModel->getKegiatanSelesai();
        }
        
        // Load dokumentasi data for galeri/dokumentasi page
        if ($page === 'galeri' || $page === 'dokumentasi') {
            $dokumentasiModel = new \App\Models\DokumentasiModel();
            $data['dokumentasiList'] = $dokumentasiModel->where('status_aktif', 1)
                                                         ->orderBy('created_at', 'DESC')
                                                         ->findAll();
            $data['fotoList'] = $dokumentasiModel->getFoto();
            $data['videoList'] = $dokumentasiModel->getVideo();
        }
        
        // Load firman data for firman page
        if ($page === 'firman') {
            $firmanModel = new \App\Models\FirmanModel();
            $data['firmanList'] = $firmanModel->getFirmanTerbit();
            $data['firmanTerbaru'] = $firmanModel->getFirmanTerbaru(5);
            $data['firmanByKategori'] = $firmanModel->countByKategori();
        }
        
        // Check if page view exists
        $pageView = APPPATH . 'Views/pages/' . $page . '.php';
        if (!file_exists($pageView)) {
            $page = 'home';
        }
        
        return view('layouts/header', $data)
             . view('pages/' . $page, $data)
             . view('layouts/footer');
    }
}
