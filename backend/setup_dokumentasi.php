<?php

// Simple database setup script for dokumentasi table
$host = 'localhost';
$database = 'gbis_anugerah';
$username = 'root';
$password = '';

echo "Setup tabel dokumentasi...\n\n";

try {
    // Connect to database
    $mysqli = new mysqli($host, $username, $password, $database);
    
    if ($mysqli->connect_error) {
        die("❌ Koneksi database gagal: " . $mysqli->connect_error . "\n");
    }
    
    echo "✓ Koneksi database berhasil\n\n";

    // Drop tabel dokumentasi jika ada
    echo "1. Menghapus tabel dokumentasi yang lama (jika ada)...\n";
    $mysqli->query("DROP TABLE IF EXISTS `dokumentasi`");
    echo "   ✓ Tabel dokumentasi berhasil dihapus\n\n";

    // Buat tabel dokumentasi yang baru
    echo "2. Membuat tabel dokumentasi yang baru...\n";
    $sql = "CREATE TABLE `dokumentasi` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `judul` VARCHAR(255) NOT NULL,
        `deskripsi` TEXT NULL,
        `kategori` ENUM('Foto','Video') NOT NULL,
        `jenis_kegiatan` ENUM('Kaum Bapak','Kaum Ibu','Pemuda','Anak-anak','Umum','Ibadah','Lainnya') NOT NULL,
        `file_path` VARCHAR(255) NOT NULL,
        `file_type` VARCHAR(50) NULL,
        `file_size` INT(11) NULL,
        `tanggal_kegiatan` DATE NULL,
        `fotografer` VARCHAR(255) NULL,
        `jumlah_views` INT(11) NOT NULL DEFAULT 0,
        `status_aktif` TINYINT(1) NOT NULL DEFAULT 1,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL,
        CONSTRAINT `pk_dokumentasi` PRIMARY KEY(`id`)
    ) DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci";
    
    if ($mysqli->query($sql)) {
        echo "   ✓ Tabel dokumentasi berhasil dibuat dengan struktur baru\n\n";
    } else {
        echo "   ❌ Error: " . $mysqli->error . "\n";
    }

    // Update migration table
    echo "3. Update migration table...\n";
    $mysqli->query("DELETE FROM migrations WHERE version = '2026-02-10-000004'");
    $mysqli->query("INSERT INTO migrations (version, class, `group`, namespace, time, batch) 
                VALUES ('2026-02-10-000004', 'App\\\\Database\\\\Migrations\\\\CreateDokumentasiTable', 'default', 'App', UNIX_TIMESTAMP(), 1)");
    echo "   ✓ Migration table berhasil diupdate\n\n";

    echo "✅ Selesai! Tabel dokumentasi sudah siap digunakan.\n";
    echo "\nSekarang Anda bisa jalankan seeder:\n";
    echo "php spark db:seed DokumentasiSeeder\n";

    $mysqli->close();

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
