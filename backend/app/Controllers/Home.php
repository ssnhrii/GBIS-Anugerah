<?php

namespace App\Controllers;

class Home extends BaseController
{
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
            return view('pages/login');
        }
        
        // Load views
        $output = view('layouts/header', $data);
        $output .= view('pages/' . $page);
        $output .= view('layouts/footer');
        
        return $output;
    }
}
