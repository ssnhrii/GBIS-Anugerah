    <footer>
        <div class="footer-content">
            <div class="footer-section footer-main">
                <div class="footer-logo">
                    <img src="<?= base_url('images/logo GBIS.png') ?>" alt="Logo GBIS">
                    <h3>GBIS Anugerah</h3>
                </div>
                <p class="footer-desc">Sistem Informasi Manajemen Gereja untuk mengelola data jemaat, kegiatan, dan dokumentasi dengan mudah dan efisien.</p>
            </div>
            
            <div class="footer-row">
                <div class="footer-section footer-info">
                    <h4>Kontak Kami</h4>
                    <div class="footer-contact">
                        <p><a href="https://maps.google.com/?q=GBIS+Anugerah" target="_blank">Jl. Contoh No. 123</a></p>
                        <p><a href="mailto:info@gbisanugerah.com">info@gbisanugerah.com</a></p>
                        <p><a href="tel:+6281234567890">62 812-3456-7890</a></p>
                    </div>
                </div>
                
                <div class="footer-section footer-admin">
                    <h4>Admin</h4>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('index.php?page=dashboard') ?>" class="btn-login">Dashboard</a>
                    <?php else: ?>
                        <a href="<?= base_url('index.php?page=login') ?>" class="btn-login">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> GBIS Anugerah. All rights reserved.</p>
            <p class="footer-credits">
                Dibuat oleh: 
                <a href="https://chrisjericho.my.id" target="_blank" rel="noopener">Chris Jericho Sembiring</a> & 
                <a href="https://berkat.my.id" target="_blank" rel="noopener">Berkat Tua Siallagan</a>
            </p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            const hamburger = document.querySelector('.hamburger');
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        // Toggle dropdown on click
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            const menu = document.getElementById('menu');
            const hamburger = document.querySelector('.hamburger');
            
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Close other dropdowns
                    dropdowns.forEach(d => {
                        if (d !== dropdown) {
                            d.classList.remove('active');
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdown.classList.toggle('active');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('header')) {
                    dropdowns.forEach(d => d.classList.remove('active'));
                    menu.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            });

            // Close menu on scroll
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (Math.abs(scrollTop - lastScrollTop) > 5) {
                    dropdowns.forEach(d => d.classList.remove('active'));
                    menu.classList.remove('active');
                    hamburger.classList.remove('active');
                }
                lastScrollTop = scrollTop;
            }, false);
        });
    </script>
</body>
</html>
