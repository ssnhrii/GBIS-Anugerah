# Panduan Content Management System GBIS

## Setup Database

Jalankan script setup untuk membuat tabel dan data awal:

```bash
cd backend
php setup_content_management.php
```

Script ini akan:

1. Membuat tabel `page_contents` untuk konten halaman
2. Membuat tabel `site_settings` untuk informasi situs
3. Menambahkan kolom `full_name` ke tabel `users`
4. Memasukkan data default untuk semua halaman
5. Memasukkan data default untuk pengaturan situs

## Fitur Content Management

### 1. Kelola Konten Halaman

**Akses:** `/admin/settings/pages`

Fitur ini memungkinkan admin untuk mengelola konten semua halaman website:

- Home (Beranda)
- Sejarah
- Jemaat
- Jemaat Bapak
- Jemaat Ibu
- Jemaat Pemuda
- Jemaat Anak
- Galeri

**Cara Menggunakan:**

1. Login ke dashboard admin
2. Klik menu **Pengaturan** di sidebar
3. Pilih submenu **Kelola Konten**
4. Klik tombol **Edit** pada halaman yang ingin diubah
5. Edit konten (bisa menggunakan HTML)
6. Klik **Simpan Perubahan**

### 2. Informasi Situs

**Akses:** `/admin/settings/site-info`

Fitur ini memungkinkan admin untuk mengelola informasi kontak dan sosial media:

- Nama Situs
- Email Kontak
- Telepon
- WhatsApp
- Alamat
- Facebook URL
- Instagram URL
- YouTube URL
- Twitter/X URL

**Cara Menggunakan:**

1. Login ke dashboard admin
2. Klik menu **Pengaturan** di sidebar
3. Pilih submenu **Informasi Situs**
4. Edit informasi yang diperlukan
5. Klik **Simpan Perubahan**

### 3. Kelola Admin

**Akses:** `/admin/settings/admins`

Fitur ini memungkinkan admin untuk mengelola akun admin lainnya:

- Tambah admin baru
- Edit data admin
- Hapus admin
- Ubah password admin

**Cara Menggunakan:**

**Tambah Admin Baru:**

1. Login ke dashboard admin
2. Klik menu **Pengaturan** di sidebar
3. Pilih submenu **Kelola Admin**
4. Klik tombol **Tambah Admin**
5. Isi form (username, nama lengkap, email, password, role)
6. Klik **Simpan**

**Edit Admin:**

1. Klik tombol **Edit** pada admin yang ingin diubah
2. Edit data yang diperlukan
3. Untuk mengubah password, isi field password baru
4. Klik **Simpan Perubahan**

**Hapus Admin:**

1. Klik tombol **Hapus** pada admin yang ingin dihapus
2. Konfirmasi penghapusan
3. Admin tidak dapat menghapus akun sendiri

## Menggunakan Konten di Frontend

### Helper Functions

Sistem menyediakan helper functions untuk mengambil konten:

```php
// Load helper
helper('content');

// Ambil konten halaman
$pageContent = get_page_content('home');
// Returns: ['page_key', 'page_title', 'content', 'meta_description', 'is_active']

// Ambil satu pengaturan
$email = get_site_setting('contact_email', 'default@email.com');

// Ambil semua pengaturan sebagai array
$settings = get_all_site_settings();
// Returns: ['site_name' => '...', 'contact_email' => '...', ...]
```

### Contoh Penggunaan di View

```php
<!-- Tampilkan konten halaman -->
<?php if ($pageContent): ?>
    <h1><?= esc($pageContent['page_title']) ?></h1>
    <div><?= $pageContent['content'] ?></div>
<?php endif; ?>

<!-- Tampilkan informasi kontak -->
<p>Email: <?= esc($siteSettings['contact_email'] ?? '') ?></p>
<p>Telepon: <?= esc($siteSettings['contact_phone'] ?? '') ?></p>
<p>Alamat: <?= esc($siteSettings['contact_address'] ?? '') ?></p>

<!-- Link sosial media -->
<a href="<?= esc($siteSettings['facebook_url'] ?? '#') ?>">Facebook</a>
<a href="<?= esc($siteSettings['instagram_url'] ?? '#') ?>">Instagram</a>
```

## Struktur Database

### Tabel: page_contents

| Field            | Type         | Description                             |
| ---------------- | ------------ | --------------------------------------- |
| id               | INT          | Primary key                             |
| page_key         | VARCHAR(100) | Kunci unik halaman (home, sejarah, dll) |
| page_title       | VARCHAR(255) | Judul halaman                           |
| content          | TEXT         | Konten halaman (HTML)                   |
| meta_description | VARCHAR(255) | Deskripsi untuk SEO                     |
| is_active        | TINYINT(1)   | Status aktif (1=aktif, 0=nonaktif)      |
| created_at       | DATETIME     | Tanggal dibuat                          |
| updated_at       | DATETIME     | Tanggal diupdate                        |

### Tabel: site_settings

| Field         | Type         | Description                                    |
| ------------- | ------------ | ---------------------------------------------- |
| id            | INT          | Primary key                                    |
| setting_key   | VARCHAR(100) | Kunci pengaturan                               |
| setting_value | TEXT         | Nilai pengaturan                               |
| setting_label | VARCHAR(255) | Label untuk form                               |
| setting_type  | ENUM         | Tipe input (text, textarea, email, phone, url) |
| updated_at    | DATETIME     | Tanggal diupdate                               |

## Keamanan

- Semua route settings dilindungi dengan filter auth
- Input di-sanitize dan di-validasi
- Password di-hash menggunakan PASSWORD_DEFAULT
- Admin tidak dapat menghapus akun sendiri
- XSS protection dengan esc() function

## Tips

1. **Backup Database:** Selalu backup database sebelum melakukan perubahan besar
2. **HTML di Konten:** Anda bisa menggunakan HTML di konten halaman untuk formatting
3. **Testing:** Test perubahan di environment development sebelum production
4. **Gambar:** Upload gambar melalui menu Dokumentasi/Galeri, lalu gunakan URL-nya di konten
5. **SEO:** Isi meta_description untuk optimasi mesin pencari

## Troubleshooting

**Error: Table doesn't exist**

- Jalankan ulang `php setup_content_management.php`

**Error: Column 'full_name' doesn't exist**

- Jalankan ulang setup script atau manual ALTER TABLE

**Konten tidak muncul di frontend**

- Pastikan halaman is_active = 1
- Clear cache browser
- Check apakah helper sudah di-load

**Tidak bisa login setelah setup**

- Pastikan tabel users sudah ada
- Check kredensial login yang benar
