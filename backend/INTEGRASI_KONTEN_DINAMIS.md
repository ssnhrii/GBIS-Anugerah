# Integrasi Konten Dinamis ke Frontend

## Cara Menggunakan Konten dari Database

### 1. Di Controller (Sudah Terintegrasi)

File: `backend/app/Controllers/GbisController.php`

```php
public function index()
{
    // Load content helper
    helper('content');

    // Get page parameter
    $page = $this->request->getGet('page') ?? 'home';

    // Load page content from database
    $pageContent = get_page_content($page);

    $data = [
        'currentPage' => $page,
        'pageContent' => $pageContent,
        'siteSettings' => get_all_site_settings()
    ];

    // ... rest of code
}
```

### 2. Di View - Menampilkan Konten Halaman

Contoh untuk halaman sejarah (`backend/app/Views/pages/sejarah.php`):

```php
<!-- Konten Dinamis dari Database -->
<?php if (isset($pageContent) && $pageContent): ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1><?= esc($pageContent['page_title']) ?></h1>
                <div class="content">
                    <?= $pageContent['content'] ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- Fallback jika konten tidak ada -->
    <div class="container py-5">
        <h1>Sejarah GBIS</h1>
        <p>Konten sedang dalam proses...</p>
    </div>
<?php endif; ?>
```

### 3. Di Footer - Menampilkan Informasi Kontak

Update file `backend/app/Views/layouts/footer.php`:

```php
<!-- Alamat dari Database -->
<a href="https://maps.app.goo.gl/..." class="d-flex align-items-center border-bottom py-4">
    <span class="flex-shrink-0 btn-square bg-primary me-3 p-4">
        <i class="btn btn-primary fa fa-map-marker-alt text-dark"></i>
    </span>
    <span><?= esc($siteSettings['contact_address'] ?? 'Alamat belum diatur') ?></span>
</a>

<!-- Telepon dari Database -->
<a href="tel:<?= esc($siteSettings['contact_phone'] ?? '') ?>" class="d-flex align-items-center border-bottom py-4">
    <span class="flex-shrink-0 btn-square bg-primary me-3 p-4">
        <i class="btn btn-primary fa fa-phone-alt text-dark"></i>
    </span>
    <span><?= esc($siteSettings['contact_phone'] ?? 'Telepon belum diatur') ?></span>
</a>

<!-- Email dari Database -->
<a href="mailto:<?= esc($siteSettings['contact_email'] ?? '') ?>" class="d-flex align-items-center py-4">
    <span class="flex-shrink-0 btn-square bg-primary me-3 p-4">
        <i class="btn btn-primary fa fa-envelope text-dark"></i>
    </span>
    <span><?= esc($siteSettings['contact_email'] ?? 'Email belum diatur') ?></span>
</a>
```

### 4. Di Header - Menampilkan Sosial Media

Update file `backend/app/Views/layouts/header.php`:

```php
<!-- Sosial Media dari Database -->
<div class="d-flex">
    <?php if (!empty($siteSettings['facebook_url'])): ?>
        <a class="btn btn-primary btn-square me-2" href="<?= esc($siteSettings['facebook_url']) ?>" target="_blank">
            <i class="fab fa-facebook-f text-white"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($siteSettings['instagram_url'])): ?>
        <a class="btn btn-primary btn-square me-2" href="<?= esc($siteSettings['instagram_url']) ?>" target="_blank">
            <i class="fab fa-instagram text-white"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($siteSettings['youtube_url'])): ?>
        <a class="btn btn-primary btn-square me-2" href="<?= esc($siteSettings['youtube_url']) ?>" target="_blank">
            <i class="fab fa-youtube text-white"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($siteSettings['twitter_url'])): ?>
        <a class="btn btn-primary btn-square" href="<?= esc($siteSettings['twitter_url']) ?>" target="_blank">
            <i class="fab fa-twitter text-white"></i>
        </a>
    <?php endif; ?>
</div>
```

### 5. Contoh Halaman Lengkap dengan Konten Dinamis

File: `backend/app/Views/pages/sejarah.php`

```php
<!-- Hero Section -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">
            <?= esc($pageContent['page_title'] ?? 'Sejarah') ?>
        </h1>
    </div>
</div>

<!-- Content Section -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <?php if (isset($pageContent) && $pageContent): ?>
                    <!-- Konten dari Database -->
                    <div class="content-wrapper">
                        <?= $pageContent['content'] ?>
                    </div>
                <?php else: ?>
                    <!-- Fallback Content -->
                    <h2>Sejarah GBIS Anugerah</h2>
                    <p>Konten sedang dalam proses pembaruan...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
```

## Helper Functions yang Tersedia

### get_page_content($pageKey)

Mengambil konten halaman berdasarkan page_key

```php
$content = get_page_content('home');
// Returns:
// [
//     'id' => 1,
//     'page_key' => 'home',
//     'page_title' => 'Beranda',
//     'content' => '<h1>...</h1>',
//     'meta_description' => '...',
//     'is_active' => 1,
//     'created_at' => '...',
//     'updated_at' => '...'
// ]
```

### get_site_setting($key, $default)

Mengambil satu pengaturan situs

```php
$email = get_site_setting('contact_email', 'default@email.com');
// Returns: 'info@gbis.org'
```

### get_all_site_settings()

Mengambil semua pengaturan sebagai array key-value

```php
$settings = get_all_site_settings();
// Returns:
// [
//     'site_name' => 'GBIS - Gereja Bethel Indonesia Surabaya',
//     'contact_email' => 'info@gbis.org',
//     'contact_phone' => '(031) 1234567',
//     'contact_address' => 'Jl. Contoh No. 123...',
//     'facebook_url' => 'https://facebook.com/gbis',
//     ...
// ]
```

## Tips Integrasi

1. **Selalu gunakan esc()** untuk output data ke HTML (XSS protection)
2. **Gunakan fallback** jika data tidak ada
3. **Load helper** di controller: `helper('content')`
4. **Pass data ke view** melalui array $data
5. **Test konten** setelah edit di admin panel

## Contoh Edit Konten di Admin

1. Login ke `/admin`
2. Klik **Pengaturan** > **Kelola Konten**
3. Klik **Edit** pada halaman "Sejarah"
4. Edit konten dengan HTML:

```html
<h2>Sejarah Berdirinya GBIS Anugerah</h2>
<p>GBIS Anugerah didirikan pada tahun...</p>

<h3>Visi dan Misi</h3>
<ul>
  <li>Visi: Menjadi gereja yang...</li>
  <li>Misi: Melayani dengan...</li>
</ul>

<div class="alert alert-info">
  <strong>Info:</strong> Ibadah setiap hari Minggu pukul 10:00 WIB
</div>
```

5. Klik **Simpan Perubahan**
6. Refresh halaman frontend untuk melihat perubahan

## Keuntungan Sistem Ini

✅ **No Coding Required** - Admin bisa edit konten tanpa coding
✅ **Real-time Update** - Perubahan langsung terlihat
✅ **Centralized** - Semua konten di satu tempat
✅ **Flexible** - Support HTML untuk formatting
✅ **SEO Friendly** - Meta description untuk setiap halaman
✅ **Secure** - Protected dengan authentication

---

**Note:** Pastikan semua halaman sudah menggunakan helper dan data dari controller!
