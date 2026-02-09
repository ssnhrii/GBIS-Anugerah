<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GBIS Anugerah</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Preload Critical Resources -->
    <link rel="preload" href="<?= base_url('css/bootstrap.min.css') ?>" as="style">
    <link rel="preload" href="<?= base_url('css/style.css') ?>" as="style">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" media="print" onload="this.media='all'"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar d-none d-lg-block">
            <div class="topbar-inner">
                <div class="row gx-0">
                    <div class="col-lg-7 text-start">
                        <div class="h-100 d-inline-flex align-items-center me-4">
                            <span class="fa fa-phone-alt me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>+012 345 6789</span></a>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="far fa-envelope me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>info@example.com</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-end">
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="text-body">Follow Us:</span>
                            <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>
                            <a class="text-body ps-4" href="<?= base_url('index.php?page=login') ?>"><i class="fa fa-user text-dark me-1"></i> login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-3">
                <a href="<?= base_url('/') ?>" class="navbar-brand">
                    <h1 class="mb-0">GBIS <span class="text-primary">Anugerah</span></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav ms-lg-auto mx-xl-auto">
                        <a href="<?= base_url('/') ?>" class="nav-item nav-link <?= ($currentPage ?? '') == 'home' ? 'active' : '' ?>">Home</a>
                        <a href="<?= base_url('index.php?page=sejarah') ?>" class="nav-item nav-link <?= ($currentPage ?? '') == 'sejarah' ? 'active' : '' ?>">Sejarah</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?= in_array($currentPage ?? '', ['jemaat', 'jemaat-bapak', 'jemaat-ibu', 'jemaat-pemuda', 'jemaat-anak']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Jemaat</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="<?= base_url('index.php?page=jemaat') ?>" class="dropdown-item">Total Jemaat</a>
                                <a href="<?= base_url('index.php?page=jemaat-bapak') ?>" class="dropdown-item">Kaum Bapak</a>
                                <a href="<?= base_url('index.php?page=jemaat-ibu') ?>" class="dropdown-item">Kaum Ibu</a>
                                <a href="<?= base_url('index.php?page=jemaat-pemuda') ?>" class="dropdown-item">Pemuda/i</a>
                                <a href="<?= base_url('index.php?page=jemaat-anak') ?>" class="dropdown-item">Anak Sekolah Minggu</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?= in_array($currentPage ?? '', ['kegiatan', 'kegiatan-ibadah', 'kegiatan-homecell', 'kegiatan-bapak', 'kegiatan-ibu', 'kegiatan-pemuda', 'kegiatan-anak']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Kegiatan</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="<?= base_url('index.php?page=kegiatan') ?>" class="dropdown-item">Kegiatan</a>
                                <a href="<?= base_url('index.php?page=kegiatan-ibadah') ?>" class="dropdown-item">Ibadah Raya</a>
                                <a href="<?= base_url('index.php?page=kegiatan-homecell') ?>" class="dropdown-item">Home Cell</a>
                                <a href="<?= base_url('index.php?page=kegiatan-bapak') ?>" class="dropdown-item">Kaum Bapak</a>
                                <a href="<?= base_url('index.php?page=kegiatan-ibu') ?>" class="dropdown-item">Kaum Ibu</a>
                                <a href="<?= base_url('index.php?page=kegiatan-pemuda') ?>" class="dropdown-item">Pemuda/i</a>
                                <a href="<?= base_url('index.php?page=kegiatan-anak') ?>" class="dropdown-item">Anak Sekolah Minggu</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?= in_array($currentPage ?? '', ['dokumentasi', 'dokumentasi-ibadah', 'dokumentasi-homecell', 'dokumentasi-bapak', 'dokumentasi-ibu', 'dokumentasi-pemuda', 'dokumentasi-anak']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Dokumentasi</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="<?= base_url('index.php?page=dokumentasi') ?>" class="dropdown-item">Dokumentasi</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-ibadah') ?>" class="dropdown-item">Ibadah Raya</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-homecell') ?>" class="dropdown-item">Home Cell</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-bapak') ?>" class="dropdown-item">Kaum Bapak</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-ibu') ?>" class="dropdown-item">Kaum Ibu</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-pemuda') ?>" class="dropdown-item">Pemuda/i</a>
                                <a href="<?= base_url('index.php?page=dokumentasi-anak') ?>" class="dropdown-item">Anak Sekolah Minggu</a>
                            </div>
                        </div>
                        <a href="<?= base_url('index.php?page=galeri') ?>" class="nav-item nav-link <?= ($currentPage ?? '') == 'galeri' ? 'active' : '' ?>">Galeri</a>
                    </div>
                    <a href="<?= base_url('index.php?page=firman') ?>" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Firman</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->
