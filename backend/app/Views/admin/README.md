# Admin Template - Bootstrap DASHMIN

Template admin ini adalah hasil migrasi dari template HTML statis Bootstrap Admin ke CodeIgniter 4.

## Struktur Folder

```
backend/
├── app/
│   ├── Controllers/
│   │   └── Admin.php                    # Controller untuk admin template
│   └── Views/
│       └── admin-template/
│           ├── layouts/
│           │   ├── header.php           # Header dengan CSS
│           │   ├── sidebar.php          # Sidebar navigasi
│           │   ├── navbar.php           # Top navbar
│           │   └── footer.php           # Footer dengan JS
│           └── pages/
│               ├── dashboard.php        # Halaman dashboard
│               ├── form.php             # Halaman form
│               ├── table.php            # Halaman table
│               └── blank.php            # Halaman blank
└── public/
    └── admin-template/
        ├── css/                         # Bootstrap & custom CSS
        ├── js/                          # JavaScript files
        ├── img/                         # Images
        └── lib/                         # Libraries (chart, carousel, dll)
```

## Cara Menggunakan

### 1. Akses Template Demo

Template dapat diakses melalui URL:

- Dashboard: `http://localhost/admin-demo`
- Form: `http://localhost/admin-demo/form`
- Table: `http://localhost/admin-demo/table`
- Blank: `http://localhost/admin-demo/blank`

### 2. Membuat Halaman Baru

**Langkah 1:** Buat file view baru di `app/Views/admin-template/pages/`

```php
<?= $this->include('admin-template/layouts/header') ?>
<?= $this->include('admin-template/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin-template/layouts/navbar') ?>

            <!-- Your Content Here -->
            <div class="container-fluid pt-4 px-4">
                <h1>Halaman Baru</h1>
            </div>

<?= $this->include('admin-template/layouts/footer') ?>
```

**Langkah 2:** Tambahkan method di `app/Controllers/Admin.php`

```php
public function halamanBaru()
{
    $this->data['title'] = 'Halaman Baru - Admin Panel';
    $this->data['active_menu'] = 'halaman-baru';

    return view('admin-template/pages/halaman-baru', $this->data);
}
```

**Langkah 3:** Tambahkan route di `app/Config/Routes.php`

```php
$routes->group('admin-demo', function($routes) {
    // ... routes lainnya
    $routes->get('halaman-baru', 'Admin::halamanBaru');
});
```

### 3. Kustomisasi Sidebar

Edit file `app/Views/admin-template/layouts/sidebar.php` untuk menambah/mengubah menu:

```php
<a href="<?= base_url('admin-demo/menu-baru') ?>" class="nav-item nav-link <?= ($active_menu ?? '') == 'menu-baru' ? 'active' : '' ?>">
    <i class="fa fa-icon me-2"></i>Menu Baru
</a>
```

### 4. Passing Data ke View

Dari controller, kirim data ke view:

```php
public function index()
{
    $this->data['title'] = 'Dashboard';
    $this->data['active_menu'] = 'dashboard';
    $this->data['user_name'] = 'John Doe';
    $this->data['statistics'] = [
        'total_users' => 100,
        'total_sales' => 5000
    ];

    return view('admin-template/pages/dashboard', $this->data);
}
```

Di view, akses dengan:

```php
<h1><?= esc($title) ?></h1>
<p>Total Users: <?= esc($statistics['total_users']) ?></p>
```

## Fitur Template

- ✅ Responsive design
- ✅ Bootstrap 5
- ✅ Font Awesome icons
- ✅ Chart.js untuk grafik
- ✅ Owl Carousel
- ✅ Tempus Dominus (date picker)
- ✅ Sidebar navigation
- ✅ Top navbar dengan dropdown
- ✅ Back to top button

## Integrasi dengan Admin Existing

Template ini disimpan di folder terpisah (`admin-template`) agar tidak mengganggu admin yang sudah ada.

Untuk mengintegrasikan dengan admin existing:

1. Copy komponen yang dibutuhkan dari `admin-template/layouts/`
2. Sesuaikan dengan struktur admin yang sudah ada
3. Update routes dan controller sesuai kebutuhan

## Catatan

- Template ini menggunakan CDN untuk beberapa library (jQuery, Bootstrap JS, Font Awesome)
- Assets lokal disimpan di `public/admin-template/`
- Semua URL menggunakan `base_url()` helper dari CI4
- Data dinamis menggunakan `esc()` untuk keamanan XSS
