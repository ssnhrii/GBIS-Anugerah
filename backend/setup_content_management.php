<?php

/**
 * Script untuk setup Content Management System
 * Menjalankan migrasi untuk tabel page_contents dan site_settings
 */

// Koneksi database langsung
$host = 'localhost';
$database = 'GBIS-Anugerah';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage() . "\n");
}

echo "=== Setup Content Management System ===\n\n";

// 1. Buat tabel page_contents
echo "1. Membuat tabel page_contents...\n";
$pdo->exec("DROP TABLE IF EXISTS page_contents");
$pdo->exec("
    CREATE TABLE page_contents (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        page_key VARCHAR(100) UNIQUE NOT NULL,
        page_title VARCHAR(255) NOT NULL,
        content TEXT,
        meta_description VARCHAR(255),
        is_active TINYINT(1) DEFAULT 1,
        created_at DATETIME,
        updated_at DATETIME
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
echo "   ✓ Tabel page_contents berhasil dibuat\n\n";

// 2. Buat tabel site_settings
echo "2. Membuat tabel site_settings...\n";
$pdo->exec("DROP TABLE IF EXISTS site_settings");
$pdo->exec("
    CREATE TABLE site_settings (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        setting_key VARCHAR(100) UNIQUE NOT NULL,
        setting_value TEXT,
        setting_label VARCHAR(255) NOT NULL,
        setting_type ENUM('text', 'textarea', 'email', 'phone', 'url') DEFAULT 'text',
        updated_at DATETIME
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
echo "   ✓ Tabel site_settings berhasil dibuat\n\n";

// 3. Tambah kolom full_name ke tabel users
echo "3. Menambahkan kolom full_name ke tabel users...\n";
try {
    $pdo->exec("ALTER TABLE users ADD COLUMN full_name VARCHAR(255) AFTER username");
    echo "   ✓ Kolom full_name berhasil ditambahkan\n\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'Duplicate column') !== false) {
        echo "   ⚠ Kolom full_name sudah ada\n\n";
    } else {
        throw $e;
    }
}

// 4. Insert data default untuk page_contents
echo "4. Memasukkan data default untuk halaman...\n";
$pages = [
    [
        'page_key' => 'home',
        'page_title' => 'Beranda',
        'content' => '<h1>Selamat Datang di GBIS</h1><p>Gereja Bethel Indonesia Surabaya adalah gereja yang melayani dengan kasih dan kebenaran firman Tuhan.</p>',
        'meta_description' => 'Selamat datang di Gereja Bethel Indonesia Surabaya',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'sejarah',
        'page_title' => 'Sejarah',
        'content' => '<h1>Sejarah GBIS</h1><p>Sejarah berdirinya Gereja Bethel Indonesia Surabaya...</p>',
        'meta_description' => 'Sejarah Gereja Bethel Indonesia Surabaya',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'jemaat',
        'page_title' => 'Jemaat',
        'content' => '<h1>Jemaat GBIS</h1><p>Informasi tentang jemaat GBIS...</p>',
        'meta_description' => 'Jemaat Gereja Bethel Indonesia Surabaya',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'jemaat-bapak',
        'page_title' => 'Jemaat Bapak',
        'content' => '<h1>Jemaat Bapak</h1><p>Persekutuan jemaat bapak...</p>',
        'meta_description' => 'Jemaat Bapak GBIS',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'jemaat-ibu',
        'page_title' => 'Jemaat Ibu',
        'content' => '<h1>Jemaat Ibu</h1><p>Persekutuan jemaat ibu...</p>',
        'meta_description' => 'Jemaat Ibu GBIS',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'jemaat-pemuda',
        'page_title' => 'Jemaat Pemuda',
        'content' => '<h1>Jemaat Pemuda</h1><p>Persekutuan jemaat pemuda...</p>',
        'meta_description' => 'Jemaat Pemuda GBIS',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'jemaat-anak',
        'page_title' => 'Jemaat Anak',
        'content' => '<h1>Jemaat Anak</h1><p>Sekolah minggu dan pelayanan anak...</p>',
        'meta_description' => 'Jemaat Anak GBIS',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
    [
        'page_key' => 'galeri',
        'page_title' => 'Galeri',
        'content' => '<h1>Galeri GBIS</h1><p>Dokumentasi kegiatan gereja...</p>',
        'meta_description' => 'Galeri Gereja Bethel Indonesia Surabaya',
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ],
];

foreach ($pages as $page) {
    $stmt = $pdo->prepare("INSERT INTO page_contents (page_key, page_title, content, meta_description, is_active, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $page['page_key'],
        $page['page_title'],
        $page['content'],
        $page['meta_description'],
        $page['is_active'],
        $page['created_at']
    ]);
}
echo "   ✓ Data halaman berhasil dimasukkan\n\n";

// 5. Insert data default untuk site_settings
echo "5. Memasukkan data default untuk pengaturan situs...\n";
$settings = [
    [
        'setting_key' => 'site_name',
        'setting_value' => 'GBIS - Gereja Bethel Indonesia Surabaya',
        'setting_label' => 'Nama Situs',
        'setting_type' => 'text',
    ],
    [
        'setting_key' => 'contact_email',
        'setting_value' => 'info@gbis.org',
        'setting_label' => 'Email Kontak',
        'setting_type' => 'email',
    ],
    [
        'setting_key' => 'contact_phone',
        'setting_value' => '(031) 1234567',
        'setting_label' => 'Telepon',
        'setting_type' => 'phone',
    ],
    [
        'setting_key' => 'contact_whatsapp',
        'setting_value' => '081234567890',
        'setting_label' => 'WhatsApp',
        'setting_type' => 'phone',
    ],
    [
        'setting_key' => 'contact_address',
        'setting_value' => 'Jl. Contoh No. 123, Surabaya, Jawa Timur',
        'setting_label' => 'Alamat',
        'setting_type' => 'textarea',
    ],
    [
        'setting_key' => 'facebook_url',
        'setting_value' => 'https://facebook.com/gbis',
        'setting_label' => 'Facebook URL',
        'setting_type' => 'url',
    ],
    [
        'setting_key' => 'instagram_url',
        'setting_value' => 'https://instagram.com/gbis',
        'setting_label' => 'Instagram URL',
        'setting_type' => 'url',
    ],
    [
        'setting_key' => 'youtube_url',
        'setting_value' => 'https://youtube.com/@gbis',
        'setting_label' => 'YouTube URL',
        'setting_type' => 'url',
    ],
    [
        'setting_key' => 'twitter_url',
        'setting_value' => 'https://twitter.com/gbis',
        'setting_label' => 'Twitter/X URL',
        'setting_type' => 'url',
    ],
];

foreach ($settings as $setting) {
    $stmt = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value, setting_label, setting_type) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $setting['setting_key'],
        $setting['setting_value'],
        $setting['setting_label'],
        $setting['setting_type']
    ]);
}
echo "   ✓ Data pengaturan situs berhasil dimasukkan\n\n";

echo "=== Setup Selesai ===\n";
echo "\nSilakan akses:\n";
echo "- Kelola Konten: /admin/settings/pages\n";
echo "- Informasi Situs: /admin/settings/site-info\n";
echo "- Kelola Admin: /admin/settings/admins\n";
