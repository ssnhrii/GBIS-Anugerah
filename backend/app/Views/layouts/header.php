<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GBIS Anugerah' ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('images/logo GBIS.png') ?>">
    <link rel="stylesheet" href="<?= base_url('css/design-system.css') ?>">
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?= base_url('images/logo GBIS.png') ?>" alt="Logo GBIS">
            <span>GBIS Anugerah</span>
        </div>
        <nav>
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul id="menu">
                <li><a href="<?= base_url() ?>" class="<?= ($currentPage ?? 'home') === 'home' ? 'active' : '' ?>">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Jemaat</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('index.php?page=jemaat-total') ?>" class="<?= ($currentPage ?? '') === 'jemaat-total' ? 'active' : '' ?>">Total Jemaat</a></li>
                        <li><a href="<?= base_url('index.php?page=jemaat-bapak') ?>" class="<?= ($currentPage ?? '') === 'jemaat-bapak' ? 'active' : '' ?>">Kaum Bapak</a></li>
                        <li><a href="<?= base_url('index.php?page=jemaat-ibu') ?>" class="<?= ($currentPage ?? '') === 'jemaat-ibu' ? 'active' : '' ?>">Kaum Ibu</a></li>
                        <li><a href="<?= base_url('index.php?page=jemaat-pemuda') ?>" class="<?= ($currentPage ?? '') === 'jemaat-pemuda' ? 'active' : '' ?>">Pemuda</a></li>
                        <li><a href="<?= base_url('index.php?page=jemaat-anak') ?>" class="<?= ($currentPage ?? '') === 'jemaat-anak' ? 'active' : '' ?>">Anak-anak</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Kegiatan</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('index.php?page=kegiatan-total') ?>" class="<?= ($currentPage ?? '') === 'kegiatan-total' ? 'active' : '' ?>">Total Kegiatan</a></li>
                        <li><a href="<?= base_url('index.php?page=kegiatan-bapak') ?>" class="<?= ($currentPage ?? '') === 'kegiatan-bapak' ? 'active' : '' ?>">Kaum Bapak</a></li>
                        <li><a href="<?= base_url('index.php?page=kegiatan-ibu') ?>" class="<?= ($currentPage ?? '') === 'kegiatan-ibu' ? 'active' : '' ?>">Kaum Ibu</a></li>
                        <li><a href="<?= base_url('index.php?page=kegiatan-pemuda') ?>" class="<?= ($currentPage ?? '') === 'kegiatan-pemuda' ? 'active' : '' ?>">Pemuda</a></li>
                        <li><a href="<?= base_url('index.php?page=kegiatan-anak') ?>" class="<?= ($currentPage ?? '') === 'kegiatan-anak' ? 'active' : '' ?>">Anak-anak</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Dokumentasi</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('index.php?page=dokumentasi-total') ?>" class="<?= ($currentPage ?? '') === 'dokumentasi-total' ? 'active' : '' ?>">Total Dokumentasi</a></li>
                        <li><a href="<?= base_url('index.php?page=dokumentasi-bapak') ?>" class="<?= ($currentPage ?? '') === 'dokumentasi-bapak' ? 'active' : '' ?>">Kaum Bapak</a></li>
                        <li><a href="<?= base_url('index.php?page=dokumentasi-ibu') ?>" class="<?= ($currentPage ?? '') === 'dokumentasi-ibu' ? 'active' : '' ?>">Kaum Ibu</a></li>
                        <li><a href="<?= base_url('index.php?page=dokumentasi-pemuda') ?>" class="<?= ($currentPage ?? '') === 'dokumentasi-pemuda' ? 'active' : '' ?>">Pemuda</a></li>
                        <li><a href="<?= base_url('index.php?page=dokumentasi-anak') ?>" class="<?= ($currentPage ?? '') === 'dokumentasi-anak' ? 'active' : '' ?>">Anak-anak</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url('index.php?page=firman') ?>" class="<?= ($currentPage ?? '') === 'firman' ? 'active' : '' ?>">Firman</a></li>
            </ul>
        </nav>
    </header>
