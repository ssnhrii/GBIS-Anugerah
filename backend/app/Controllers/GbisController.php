<?php

namespace App\Controllers;

class GbisController extends BaseController
{
    public function index()
    {
        // Get page parameter from URL
        $page = $this->request->getGet('page') ?? 'home';
        
        // Sanitize page name
        $page = preg_replace('/[^a-z0-9\-]/', '', strtolower($page));
        
        $data = [
            'currentPage' => $page
        ];
        
        // Check if page view exists
        $pageView = APPPATH . 'Views/pages/' . $page . '.php';
        if (!file_exists($pageView)) {
            $page = 'home';
        }
        
        return view('layouts/header', $data)
             . view('pages/' . $page)
             . view('layouts/footer');
    }
}
