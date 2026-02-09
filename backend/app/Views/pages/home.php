<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <p class="fs-4 text-dark">SELAMAT DATANG DI GBIS ANUGERAH</p>
                    <h1 class="display-1 mb-5 text-dark">Melayani Dengan Kasih</h1>
                    <a href="#tentang" class="btn btn-primary py-3 px-5">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid about py-5"  id="tentang">
    <div class="container py-5">
        <div class="row g-5 mb-5">
            <div class="col-xl-6">
                <div class="row g-4">
                    <div class="col-6">
                        <img src="<?= base_url('img/about-1.jpg') ?>" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="">
                    </div>
                    <div class="col-6">
                        <img src="<?= base_url('img/about-2.jpg') ?>" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                        <img src="<?= base_url('img/about-3.jpg') ?>" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fs-5 text-uppercase text-primary">Tentang GBIS Anugerah</p>
                <h1 class="display-5 pb-4 m-0">Gereja Bethel Injil Sepenuh Anugerah</h1>
                <p class="pb-4">GBIS Anugerah adalah gereja yang melayani dengan kasih dan kebenaran firman Tuhan. Kami berkomitmen untuk membangun jemaat yang kuat dalam iman dan karakter Kristus.</p>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="ps-3 d-flex align-items-center justify-content-start">
                            <div class="ms-4">
                                <h5>Visi Kami</h5>
                                <p>Menjadi gereja yang membawa transformasi bagi jemaat dan masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ps-3 d-flex align-items-center justify-content-start">
                            <div class="ms-4">
                                <h5>Misi Kami</h5>
                                <p>Melayani dengan kasih dan mengajarkan kebenaran firman Tuhan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-3 mb-4">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-3">
                            <img src="<?= base_url('img/about-child.jpg') ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="col-6">
                            <p class="mb-0">Lorem ipsum dolor sit amet elit. Donec tempus eros vel dolor mattis aliquam. Etiam quis mauris justo.</p>
                        </div>
                        <div class="col-3">
                            <h2 class="mb-0 text-primary text-center">$20,46</h2>
                            <h5 class="mb-0 text-center">Raised</h5>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6">
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Ibadah Raya</p>
                        <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Home Cell</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Sekolah Minggu</p>
                        <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Pelayanan Sosial</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center bg-primary py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row g-4 align-items-center">
                <div class="col-lg-2">
                    <i class="fa fa-church fa-5x text-white"></i>
                </div>
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="mb-0 text-white">Mari Bergabung Bersama Kami Dalam Ibadah dan Persekutuan</h1>
                </div>
                <div class="col-lg-3">
                    <a href="<?= base_url('index.php?page=kegiatan') ?>" class="btn btn-light py-2 px-4">Lihat Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Activities Start -->
<div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Kegiatan</p>
            <h1 class="display-3">Kegiatan Gereja Kami</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-church fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Ibadah Raya</h4>
                        <p class="mb-4">Ibadah minggu bersama seluruh jemaat untuk memuji dan menyembah Tuhan.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-ibadah') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-home fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Home Cell</h4>
                        <p class="mb-4">Persekutuan kelompok kecil di rumah-rumah untuk saling menguatkan iman.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-homecell') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-child fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Sekolah Minggu</h4>
                        <p class="mb-4">Pembinaan iman untuk anak-anak melalui cerita Alkitab dan aktivitas.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-anak') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-users fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Persekutuan Pemuda</h4>
                        <p class="mb-4">Kegiatan pemuda untuk bertumbuh bersama dalam iman dan persahabatan.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-pemuda') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-male fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Kaum Bapak</h4>
                        <p class="mb-4">Persekutuan dan pembinaan untuk kaum bapak dalam keluarga dan gereja.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-bapak') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-female fa-4x text-dark"></i>
                    <div class="ms-4">
                        <h4>Kaum Ibu</h4>
                        <p class="mb-4">Persekutuan dan pembinaan untuk kaum ibu dalam keluarga dan gereja.</p>
                        <a href="<?= base_url('index.php?page=kegiatan-ibu') ?>" class="btn btn-primary px-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Activities End -->
<!-- Activities End -->

<!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Kegiatan <span class="text-primary">Mendatang</span></h1>
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>Minggu</h6>
                    <p class="mb-0">10:00 WIB</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Ibadah Raya Minggu</h4>
                    <p class="mb-4">Ibadah minggu bersama seluruh jemaat untuk memuji dan menyembah Tuhan dengan penuh sukacita.</p>
                    <a href="<?= base_url('index.php?page=kegiatan-ibadah') ?>" class="btn btn-primary px-3">Lihat Detail</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="<?= base_url('img/events-1.jpg') ?>" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.3s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>Rabu</h6>
                    <p class="mb-0">19:00 WIB</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Persekutuan Doa</h4>
                    <p class="mb-4">Persekutuan doa bersama untuk saling mendoakan dan menguatkan iman.</p>
                    <a href="<?= base_url('index.php?page=kegiatan') ?>" class="btn btn-primary px-3">Lihat Detail</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="<?= base_url('img/events-2.jpg') ?>" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.5s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>Jumat</h6>
                    <p class="mb-0">19:30 WIB</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Persekutuan Pemuda</h4>
                    <p class="mb-4">Kegiatan pemuda untuk bertumbuh bersama dalam iman dan persahabatan.</p>
                    <a href="<?= base_url('index.php?page=kegiatan-pemuda') ?>" class="btn btn-primary px-3">Lihat Detail</a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="<?= base_url('img/events-3.jpg') ?>" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events End -->

<!-- Sermon Start -->
<div class="container-fluid sermon py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Firman Tuhan</p>
            <h1 class="display-3">Renungan dan Khotbah</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="<?= base_url('img/sermon-1.jpg') ?>" class="img-fluid w-100" alt="">
                    </div>
                    <div class="p-4">
                        <div class="sermon-meta d-flex justify-content-between pb-2">
                            <div class="">
                                <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">Minggu Ini</a></small>
                                <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Gembala</a></small>
                            </div>
                            <div class="">
                                <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                            </div>
                        </div>
                        <a href="<?= base_url('index.php?page=firman') ?>" class="d-inline-block h4 lh-sm mb-3">Kasih yang Sejati</a>
                        <p class="mb-0">Firman Tuhan mengajarkan kita untuk mengasihi sesama seperti diri sendiri dan mengasihi Tuhan dengan segenap hati.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="<?= base_url('img/sermon-2.jpg') ?>" class="img-fluid w-100" alt="">
                    </div>
                    <div class="p-4">
                        <div class="sermon-meta d-flex justify-content-between pb-2">
                            <div class="">
                                <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">Minggu Lalu</a></small>
                                <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Gembala</a></small>
                            </div>
                            <div class="">
                                <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                            </div>
                        </div>
                        <a href="<?= base_url('index.php?page=firman') ?>" class="d-inline-block h4 lh-sm mb-3">Iman yang Teguh</a>
                        <p class="mb-0">Membangun iman yang kuat melalui doa, firman Tuhan, dan persekutuan dengan sesama orang percaya.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="<?= base_url('img/sermon-3.jpg') ?>" class="img-fluid w-100" alt="">
                    </div>
                    <div class="p-4">
                        <div class="sermon-meta d-flex justify-content-between pb-2">
                            <div class="">
                                <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">2 Minggu Lalu</a></small>
                                <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Gembala</a></small>
                            </div>
                            <div class="">
                                <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                            </div>
                        </div>
                        <a href="<?= base_url('index.php?page=firman') ?>" class="d-inline-block h4 lh-sm mb-3">Pengharapan dalam Kristus</a>
                        <p class="mb-0">Kristus adalah pengharapan kita yang hidup, memberikan kekuatan di tengah kesulitan hidup.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sermon End -->
