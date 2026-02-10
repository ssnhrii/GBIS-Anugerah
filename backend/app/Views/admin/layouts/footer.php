            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">GBIS Anugerah</a>, Hak Cipta Dilindungi.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Dibuat Oleh <a href="https://chrisjericho.my.id">Chris J. Sembiring</a> dan <a href="http://berkat.my.id">Berkat T. Siallagan</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('admin/lib/chart/chart.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('admin/js/main.js') ?>"></script>

    <!-- Auto-close Sidebar on Scroll and Click Outside -->
    <script>
    (function() {
        const sidebar = document.querySelector('.sidebar');
        const content = document.querySelector('.content');
        
        if (!sidebar || !content) return;
        
        // Close sidebar on scroll (mobile only)
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (window.innerWidth < 992) { // Only on mobile/tablet
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    if (sidebar.classList.contains('open')) {
                        sidebar.classList.remove('open');
                    }
                }, 150);
            }
        });
        
        // Close sidebar when clicking outside (mobile only)
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 992) { // Only on mobile/tablet
                const sidebarToggle = document.querySelector('.sidebar-toggler');
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = sidebarToggle && sidebarToggle.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                }
            }
        });
    })();
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>

