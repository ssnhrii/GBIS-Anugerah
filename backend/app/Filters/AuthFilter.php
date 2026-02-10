<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Validasi Session Hijacking - cek IP address dan user agent
        $currentIP = $request->getIPAddress();
        $currentUserAgent = $request->getUserAgent()->getAgentString();
        
        $sessionIP = session()->get('ip_address');
        $sessionUserAgent = session()->get('user_agent');

        // Jika IP atau User Agent berubah, logout paksa (kemungkinan session hijacking)
        if ($sessionIP !== $currentIP || $sessionUserAgent !== $currentUserAgent) {
            session()->destroy();
            log_message('warning', "Possible session hijacking detected. Session IP: {$sessionIP}, Current IP: {$currentIP}");
            return redirect()->to('/login')->with('error', 'Sesi tidak valid. Silakan login kembali.');
        }

        // Cek session timeout (30 menit inactivity)
        $loginTime = session()->get('login_time');
        $sessionTimeout = 1800; // 30 menit dalam detik
        
        if ($loginTime && (time() - $loginTime) > $sessionTimeout) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Sesi telah berakhir. Silakan login kembali.');
        }

        // Update login time untuk reset timeout
        session()->set('login_time', time());
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
