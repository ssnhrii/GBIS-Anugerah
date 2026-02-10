<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes - GBIS Anugerah Template
$routes->get('/', 'GbisController::index');
$routes->get('index.php', 'GbisController::index');

// Auth routes
$routes->get('login', 'AuthController::index'); // Tambah route GET untuk login page
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Admin routes (protected) - Using parameter-based URL
$routes->get('admin', 'AdminController::index', ['filter' => 'auth']);
$routes->get('admin/index.php', 'AdminController::index', ['filter' => 'auth']);
$routes->post('admin/index.php', 'AdminController::handlePost', ['filter' => 'auth']);

// Admin CRUD routes (RESTful style - optional, untuk future improvement)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    // Dashboard
    $routes->get('dashboard', 'AdminController::index');
    
    // Jemaat
    $routes->get('jemaat', 'AdminController::jemaat');
    $routes->get('jemaat/tambah', 'AdminController::jemaatTambah');
    $routes->post('jemaat/simpan', 'AdminController::jemaatSimpan');
    $routes->get('jemaat/edit/(:num)', 'AdminController::jemaatEdit/$1');
    $routes->post('jemaat/update/(:num)', 'AdminController::jemaatUpdate/$1');
    $routes->get('jemaat/hapus/(:num)', 'AdminController::jemaatHapus/$1');
    $routes->get('jemaat/view/(:num)', 'AdminController::jemaatView/$1');
    
    // Kegiatan
    $routes->get('kegiatan', 'AdminController::kegiatan');
    $routes->get('kegiatan/tambah', 'AdminController::kegiatanTambah');
    $routes->post('kegiatan/simpan', 'AdminController::kegiatanSimpan');
    $routes->get('kegiatan/edit/(:num)', 'AdminController::kegiatanEdit/$1');
    $routes->post('kegiatan/update/(:num)', 'AdminController::kegiatanUpdate/$1');
    $routes->get('kegiatan/hapus/(:num)', 'AdminController::kegiatanHapus/$1');
    $routes->get('kegiatan/view/(:num)', 'AdminController::kegiatanView/$1');
    
    // Dokumentasi
    $routes->get('dokumentasi', 'AdminController::dokumentasi');
    $routes->get('dokumentasi/tambah', 'AdminController::dokumentasiTambah');
    $routes->post('dokumentasi/simpan', 'AdminController::dokumentasiSimpan');
    $routes->get('dokumentasi/edit/(:num)', 'AdminController::dokumentasiEdit/$1');
    $routes->post('dokumentasi/update/(:num)', 'AdminController::dokumentasiUpdate/$1');
    $routes->get('dokumentasi/hapus/(:num)', 'AdminController::dokumentasiHapus/$1');
    
    // Firman
    $routes->get('firman', 'AdminController::firman');
    $routes->get('firman/tambah', 'AdminController::firmanTambah');
    $routes->post('firman/simpan', 'AdminController::firmanSimpan');
    $routes->get('firman/edit/(:num)', 'AdminController::firmanEdit/$1');
    $routes->post('firman/update/(:num)', 'AdminController::firmanUpdate/$1');
    $routes->get('firman/hapus/(:num)', 'AdminController::firmanHapus/$1');
});

// Admin Profile & Settings routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('profile', 'AdminController::profile');
    $routes->post('profile/update', 'AdminController::profileUpdate');
    $routes->get('settings', 'AdminController::settings');
    $routes->post('settings/update', 'AdminController::settingsUpdate');
});

// Settings routes
$routes->group('admin/settings', ['filter' => 'auth'], function($routes) {
    // Kelola Konten Halaman
    $routes->get('pages', 'SettingsController::pageList');
    $routes->get('pages/edit/(:num)', 'SettingsController::pageEdit/$1');
    $routes->post('pages/edit/(:num)', 'SettingsController::pageEdit/$1');
    
    // Informasi Situs
    $routes->get('site-info', 'SettingsController::siteInfo');
    $routes->post('site-info', 'SettingsController::siteInfo');
    
    // Kelola Admin
    $routes->get('admins', 'SettingsController::adminList');
    $routes->get('admins/add', 'SettingsController::adminAdd');
    $routes->post('admins/add', 'SettingsController::adminAdd');
    $routes->get('admins/edit/(:num)', 'SettingsController::adminEdit/$1');
    $routes->post('admins/edit/(:num)', 'SettingsController::adminEdit/$1');
    $routes->get('admins/delete/(:num)', 'SettingsController::adminDelete/$1');
});
