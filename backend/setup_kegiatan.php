<?php

// Simple database setup script for kegiatan table
$host = 'localhost';
$database = 'gbis_anugerah';
$username = 'root';
$password = '';

echo "Setup tabel kegiatan...\n\n";

try {
    // Connect to database
    $mysqli = new mysqli($host, $username, $password, $database);
    
    if ($mysqli->connect_error) {
        die("❌ Koneksi database gagal: " . $mysqli->connect_error . "\n");
    }
    
    echo "✓ Koneksi database berhasil\n\n";

    // Drop tabel kegiatan jika ada
    echo "1. Menghapus tabel kegiatan yang lama (jika ada)...\n";
    $mysqli->query("DROP TABLE IF EXISTS `kegiatan`");
    echo "   ✓ Tabel kegiatan berhasil dihapus\n\n";

    // Buat tabel kegiatan yang baru
    echo "2. Membuat tabel kegiatan yang baru...\n";
    $sql = "CREATE TABLE `kegiatan` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `judul_kegiatan` VARCHAR(255) NOT NULL,
        `deskripsi` TEXT NULL,
        `kategori` ENUM('Kaum Bapak','Kaum Ibu','Pemuda','Anak-anak','Umum') NOT NULL,
        `tanggal_kegiatan` DATE NOT NULL,
        `waktu_mulai` TIME NULL,
        `waktu_selesai` TIME NULL,
        `lokasi` VARCHAR(255) NULL,
        `pembicara` VARCHAR(255) NULL,
        `jumlah_peserta` INT(11) NULL DEFAULT 0,
        `foto_kegiatan` VARCHAR(255) NULL,
        `status` ENUM('Akan Datang','Sedang Berlangsung','Selesai','Dibatalkan') NOT NULL DEFAULT 'Akan Datang',
        `status_aktif` TINYINT(1) NOT NULL DEFAULT 1,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL,
        CONSTRAINT `pk_kegiatan` PRIMARY KEY(`id`)
    ) DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci";
    
    if ($mysqli->query($sql)) {
        echo "   ✓ Tabel kegiatan berhasil dibuat dengan struktur baru\n\n";
    } else {
        echo "   ❌ Error: " . $mysqli->error . "\n";
    }

    // Update migration table
    echo "3. Update migration table...\n";
    $mysqli->query("DELETE FROM migrations WHERE version = '2026-02-10-000003'");
    $mysqli->query("INSERT INTO migrations (version, class, `group`, namespace, time, batch) 
                VALUES ('2026-02-10-000003', 'App\\\\Database\\\\Migrations\\\\CreateKegiatanTable', 'default', 'App', UNIX_TIMESTAMP(), 1)");
    echo "   ✓ Migration table berhasil diupdate\n\n";

    echo "✅ Selesai! Tabel kegiatan sudah siap digunakan.\n";
    echo "\nSekarang Anda bisa jalankan seeder:\n";
    echo "php spark db:seed KegiatanSeeder\n";

    $mysqli->close();

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
