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
$routes->get('admin', 'AdminController::index');
$routes->get('admin/index.php', 'AdminController::index');
$routes->post('admin/index.php', 'AdminController::handlePost');

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
