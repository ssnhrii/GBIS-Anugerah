<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin - GBIS Anugerah' ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('images/logo GBIS.png') ?>">
    
    <!-- Preconnect untuk Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="<?= base_url('css/design-system.css') ?>">
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url('images/logo GBIS.png') ?>" alt="Logo GBIS">
            <h3>GBIS Admin</h3>
        </div>
        
        <nav class="sidebar-nav">
            <a href="<?= base_url('admin') ?>" class="nav-item <?= ($currentPage ?? 'dashboard') === 'dashboard' ? 'active' : '' ?>">
                <span class="nav-icon">📊</span>
                <span class="nav-text">Dashboard</span>
            </a>
            
            <div class="nav-group">
                <span class="nav-group-title">Jemaat</span>
                <a href="<?= base_url('admin/jemaat') ?>" class="nav-item <?= ($currentPage ?? '') === 'jemaat' ? 'active' : '' ?>">
                    <span class="nav-icon">👥</span>
                    <span class="nav-text">Semua Jemaat</span>
                </a>
                <a href="<?= base_url('admin/jemaat/tambah') ?>" class="nav-item">
                    <span class="nav-icon">➕</span>
                    <span class="nav-text">Tambah Jemaat</span>
                </a>
            </div>
            
            <div class="nav-group">
                <span class="nav-group-title">Kegiatan</span>
                <a href="<?= base_url('admin/kegiatan') ?>" class="nav-item <?= ($currentPage ?? '') === 'kegiatan' ? 'active' : '' ?>">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Semua Kegiatan</span>
                </a>
                <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="nav-item">
                    <span class="nav-icon">➕</span>
                    <span class="nav-text">Buat Kegiatan</span>
                </a>
            </div>
            
            <div class="nav-group">
                <span class="nav-group-title">Dokumentasi</span>
                <a href="<?= base_url('admin/dokumentasi') ?>" class="nav-item <?= ($currentPage ?? '') === 'dokumentasi' ? 'active' : '' ?>">
                    <span class="nav-icon">📸</span>
                    <span class="nav-text">Semua Dokumentasi</span>
                </a>
                <a href="<?= base_url('admin/dokumentasi/upload') ?>" class="nav-item">
                    <span class="nav-icon">📤</span>
                    <span class="nav-text">Upload</span>
                </a>
            </div>
            
            <a href="<?= base_url('admin/firman') ?>" class="nav-item <?= ($currentPage ?? '') === 'firman' ? 'active' : '' ?>">
                <span class="nav-icon">📖</span>
                <span class="nav-text">Firman</span>
            </a>
            
            <div class="nav-divider"></div>
            
            <a href="<?= base_url() ?>" class="nav-item" target="_blank">
                <span class="nav-icon">🌐</span>
                <span class="nav-text">Lihat Website</span>
            </a>
            
            <a href="<?= base_url('logout') ?>" class="nav-item nav-logout">
                <span class="nav-icon">🚪</span>
                <span class="nav-text">Keluar</span>
            </a>
        </nav>
    </aside>
    
    <div class="admin-content">
