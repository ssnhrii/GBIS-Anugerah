<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes - GBIS Anugerah Template
$routes->get('/', 'GbisController::index');
$routes->get('index.php', 'GbisController::index');

// Auth routes
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Admin routes (protected)
$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::index');
    
    // Jemaat CRUD
    $routes->get('jemaat', 'AdminController::jemaat');
    $routes->get('jemaat/tambah', 'AdminController::jemaatTambah');
    $routes->post('jemaat/simpan', 'AdminController::jemaatSimpan');
    $routes->get('jemaat/edit/(:num)', 'AdminController::jemaatEdit/$1');
    $routes->post('jemaat/update/(:num)', 'AdminController::jemaatUpdate/$1');
    $routes->get('jemaat/hapus/(:num)', 'AdminController::jemaatHapus/$1');
    
    // Kegiatan CRUD
    $routes->get('kegiatan', 'AdminController::kegiatan');
    $routes->get('kegiatan/tambah', 'AdminController::kegiatanTambah');
    $routes->post('kegiatan/simpan', 'AdminController::kegiatanSimpan');
    $routes->get('kegiatan/edit/(:num)', 'AdminController::kegiatanEdit/$1');
    $routes->post('kegiatan/update/(:num)', 'AdminController::kegiatanUpdate/$1');
    $routes->get('kegiatan/hapus/(:num)', 'AdminController::kegiatanHapus/$1');
    
    // Dokumentasi CRUD
    $routes->get('dokumentasi', 'AdminController::dokumentasi');
    $routes->get('dokumentasi/tambah', 'AdminController::dokumentasiTambah');
    $routes->post('dokumentasi/simpan', 'AdminController::dokumentasiSimpan');
    $routes->get('dokumentasi/edit/(:num)', 'AdminController::dokumentasiEdit/$1');
    $routes->post('dokumentasi/update/(:num)', 'AdminController::dokumentasiUpdate/$1');
    $routes->get('dokumentasi/hapus/(:num)', 'AdminController::dokumentasiHapus/$1');
    
    // Firman CRUD
    $routes->get('firman', 'AdminController::firman');
    $routes->get('firman/tambah', 'AdminController::firmanTambah');
    $routes->post('firman/simpan', 'AdminController::firmanSimpan');
    $routes->get('firman/edit/(:num)', 'AdminController::firmanEdit/$1');
    $routes->post('firman/update/(:num)', 'AdminController::firmanUpdate/$1');
    $routes->get('firman/hapus/(:num)', 'AdminController::firmanHapus/$1');
});
