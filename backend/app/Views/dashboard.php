<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <li><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Jemaat</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Total Jemaat</a></li>
                        <li><a href="#">Kaum Bapak</a></li>
                        <li><a href="#">Kaum Ibu</a></li>
                        <li><a href="#">Pemuda</a></li>
                        <li><a href="#">Anak-anak</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Kegiatan</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Kaum Bapak</a></li>
                        <li><a href="#">Kaum Ibu</a></li>
                        <li><a href="#">Pemuda</a></li>
                        <li><a href="#">Anak-anak</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Dokumentasi</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Total Dokumentasi</a></li>
                        <li><a href="#">Kaum Bapak</a></li>
                        <li><a href="#">Kaum Ibu</a></li>
                        <li><a href="#">Pemuda</a></li>
                        <li><a href="#">Anak-anak</a></li>
                    </ul>
                </li>
                <li><a href="#">Firman</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Selamat Datang di Dashboard</h1>
            <p>Ini adalah halaman dashboard responsif dengan CodeIgniter 4</p>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Dashboard. All rights reserved.</p>
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
