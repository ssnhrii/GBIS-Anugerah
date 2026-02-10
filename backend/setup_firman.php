<?php

// Simple database setup script for firman table
$host = 'localhost';
$database = 'gbis_anugerah';
$username = 'root';
$password = '';

echo "Setup tabel firman...\n\n";

try {
    // Connect to database
    $mysqli = new mysqli($host, $username, $password, $database);
    
    if ($mysqli->connect_error) {
        die("❌ Koneksi database gagal: " . $mysqli->connect_error . "\n");
    }
    
    echo "✓ Koneksi database berhasil\n\n";

    // Drop tabel firman jika ada
    echo "1. Menghapus tabel firman yang lama (jika ada)...\n";
    $mysqli->query("DROP TABLE IF EXISTS `firman`");
    echo "   ✓ Tabel firman berhasil dihapus\n\n";

    // Buat tabel firman yang baru
    echo "2. Membuat tabel firman yang baru...\n";
    $sql = "CREATE TABLE `firman` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `judul` VARCHAR(255) NOT NULL,
        `ayat_alkitab` VARCHAR(255) NULL,
        `isi_ayat` TEXT NULL,
        `isi_renungan` TEXT NOT NULL,
        `penulis` VARCHAR(255) NULL,
        `tanggal_publikasi` DATE NOT NULL,
        `kategori` ENUM('Renungan Harian','Renungan Minggu','Artikel Rohani','Kesaksian','Lainnya') NOT NULL DEFAULT 'Renungan Harian',
        `gambar_cover` VARCHAR(255) NULL,
        `jumlah_views` INT(11) NOT NULL DEFAULT 0,
        `status` ENUM('Draft','Terbit') NOT NULL DEFAULT 'Draft',
        `status_aktif` TINYINT(1) NOT NULL DEFAULT 1,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL,
        CONSTRAINT `pk_firman` PRIMARY KEY(`id`)
    ) DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci";
    
    if ($mysqli->query($sql)) {
        echo "   ✓ Tabel firman berhasil dibuat dengan struktur baru\n\n";
    } else {
        echo "   ❌ Error: " . $mysqli->error . "\n";
    }

    // Update migration table
    echo "3. Update migration table...\n";
    $mysqli->query("DELETE FROM migrations WHERE version = '2026-02-10-000005'");
    $mysqli->query("INSERT INTO migrations (version, class, `group`, namespace, time, batch) 
                VALUES ('2026-02-10-000005', 'App\\\\Database\\\\Migrations\\\\CreateFirmanTable', 'default', 'App', UNIX_TIMESTAMP(), 1)");
    echo "   ✓ Migration table berhasil diupdate\n\n";

    echo "✅ Selesai! Tabel firman sudah siap digunakan.\n";
    echo "\nSekarang Anda bisa jalankan seeder:\n";
    echo "php spark db:seed FirmanSeeder\n";

    $mysqli->close();

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
