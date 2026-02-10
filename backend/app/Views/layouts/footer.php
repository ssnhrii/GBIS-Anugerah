    <!-- Footer Start -->
    <div class="container-fluid footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-4 footer-inner">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">GBIS <span class="text-primary">Anugerah</span></h4>
                        <p class="mb-4 text-secondary">Gereja Bethel Injil Sepenuh Anugerah - Melayani dengan kasih dan kebenaran firman Tuhan.</p>
                        <a href="<?= base_url('index.php?page=login') ?>" class="btn btn-primary py-2 px-4">Login</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">GBIS Anugerah</h4>
                        <div class="d-flex flex-column">
                            <h6 class="text-secondary mb-0">Alamat Kami</h6>
                            <a href="https://maps.app.goo.gl/Zm7rYMwnu3fCJvud6" class="d-flex align-items-center border-bottom py-4 text-body text-decoration-none">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="btn btn-primary fa fa-map-marker-alt text-dark"></i></span>
                                <span>Duriangkang, Kec. Sei Beduk, Kota Batam, Kepulauan Riau</span>
                            </a>
                            <h6 class="text-secondary mt-4 mb-0">Kontak Kami</h6>
                            <a href="https://wa.me/6282284710929" class="d-flex align-items-center border-bottom py-4 text-body text-decoration-none">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="btn btn-primary fa fa-phone-alt text-dark"></i></span>
                                <span>+62 822 8471 0929</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Menu</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-body mb-2" href="<?= base_url('/') ?>"><i class="fa fa-check text-primary me-2"></i>Home</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=sejarah') ?>"><i class="fa fa-check text-primary me-2"></i>Sejarah</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=jemaat') ?>"><i class="fa fa-check text-primary me-2"></i>Jemaat</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=kegiatan') ?>"><i class="fa fa-check text-primary me-2"></i>Kegiatan</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=dokumentasi') ?>"><i class="fa fa-check text-primary me-2"></i>Dokumentasi</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=galeri') ?>"><i class="fa fa-check text-primary me-2"></i>Galeri</a>
                            <a class="text-body mb-2" href="<?= base_url('index.php?page=firman') ?>"><i class="fa fa-check text-primary me-2"></i>Firman</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Postingan Terbaru</h4>
                        <div class="d-flex border-bottom border-secondary py-4">
                            <img src="<?= base_url('img/download (3).jpg') ?>" class="img-fluid flex-shrink-0" alt="" loading="lazy">
                            <div class="ps-3">
                                <p class="mb-0 text-muted">01 Jan 2045</p>
                                <a href="" class="text-body">Lorem ipsum dolor sit amet elit eros vel</a>
                            </div>
                        </div>
                        <div class="d-flex py-4">
                            <img src="<?= base_url('img/download (4).jpg') ?>" class="img-fluid flex-shrink-0" alt="" loading="lazy">
                            <div class="ps-3">
                                <p class="mb-0 text-muted">01 Jan 2045</p>
                                <a href="" class="text-body">Lorem ipsum dolor sit amet elit eros vel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="border-top border-secondary pb-4"></div>
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">GBIS Anugerah</a>, Hak Cipta Dilindungi.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Dibuat Oleh <a class="border-bottom" href="https://chrisjericho.my.id" target="_blank">Chris J. Sembiring</a> & <a class="border-bottom" href="https://berkat.my.id" target="_blank">Berkat T. Siallagan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('lib/wow/wow.min.js') ?>"></script>
    <script src="<?= base_url('lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('lib/owlcarousel/owl.carousel.min.js') ?>" defer></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('js/main.js') ?>"></script>
    
    <!-- Navigation Debug (Development Only) -->
    <script src="<?= base_url('js/navigation-debug.js') ?>"></script>
    
    <!-- Auto-close Navbar on Scroll and Click Outside (Mobile) -->
    <script>
    (function() {
        const navbarCollapse = document.getElementById('navbarCollapse');
        const navbarToggler = document.querySelector('.navbar-toggler');
        
        if (!navbarCollapse || !navbarToggler) return;
        
        // Close navbar on scroll (mobile only)
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (window.innerWidth < 992) { // Only on mobile/tablet
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            toggle: false
                        });
                        bsCollapse.hide();
                    }
                }, 150);
            }
        });
        
        // Close navbar when clicking outside (mobile only)
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 992) { // Only on mobile/tablet
                const isClickInsideNav = navbarCollapse.contains(event.target);
                const isClickOnToggle = navbarToggler.contains(event.target);
                
                if (!isClickInsideNav && !isClickOnToggle && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            }
        });
        
        // Mobile Login Link - Scroll to Footer
        const mobileLoginLink = document.getElementById('mobileLoginLink');
        if (mobileLoginLink) {
            mobileLoginLink.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Close navbar first
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });
                bsCollapse.hide();
                
                // Scroll to footer smoothly
                const footer = document.querySelector('.footer');
                if (footer) {
                    setTimeout(function() {
                        footer.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'start' 
                        });
                    }, 300);
                }
            });
        }
    })();
    </script>
</body>
</html>
