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
    $routes->get('jemaat', 'AdminController::jemaat');
    $routes->get('kegiatan', 'AdminController::kegiatan');
    $routes->get('dokumentasi', 'AdminController::dokumentasi');
    $routes->get('firman', 'AdminController::firman');
});
