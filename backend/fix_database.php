<?php

// Simple database fix script
$host = 'localhost';
$database = 'gbis_anugerah';
$username = 'root';
$password = '';

echo "Memperbaiki struktur tabel jemaat...\n\n";

try {
    // Connect to database
    $mysqli = new mysqli($host, $username, $password, $database);
    
    if ($mysqli->connect_error) {
        die("❌ Koneksi database gagal: " . $mysqli->connect_error . "\n");
    }
    
    echo "✓ Koneksi database berhasil\n\n";

    // Drop tabel jemaat yang lama
    echo "1. Menghapus tabel jemaat yang lama...\n";
    $mysqli->query("DROP TABLE IF EXISTS `jemaat`");
    echo "   ✓ Tabel jemaat berhasil dihapus\n\n";

    // Buat tabel jemaat yang baru
    echo "2. Membuat tabel jemaat yang baru...\n";
    $sql = "CREATE TABLE `jemaat` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `nama_lengkap` VARCHAR(255) NOT NULL,
        `jenis_kelamin` ENUM('Laki-laki','Perempuan') NOT NULL,
        `tanggal_lahir` DATE NULL,
        `tempat_lahir` VARCHAR(255) NULL,
        `alamat` TEXT NULL,
        `nomor_telepon` VARCHAR(20) NULL,
        `email` VARCHAR(255) NULL,
        `kategori` ENUM('Kaum Bapak','Kaum Ibu','Pemuda','Anak-anak') NOT NULL,
        `status_pernikahan` ENUM('Belum Menikah','Menikah','Duda','Janda') NULL,
        `pekerjaan` VARCHAR(255) NULL,
        `tanggal_baptis` DATE NULL,
        `tanggal_sidi` DATE NULL,
        `status_aktif` TINYINT(1) NOT NULL DEFAULT 1,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL,
        CONSTRAINT `pk_jemaat` PRIMARY KEY(`id`)
    ) DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci";
    
    if ($mysqli->query($sql)) {
        echo "   ✓ Tabel jemaat berhasil dibuat dengan struktur baru\n\n";
    } else {
        echo "   ❌ Error: " . $mysqli->error . "\n";
    }

    // Update migration table
    echo "3. Update migration table...\n";
    $mysqli->query("DELETE FROM migrations WHERE version = '2026-02-10-000002'");
    $mysqli->query("INSERT INTO migrations (version, class, `group`, namespace, time, batch) 
                VALUES ('2026-02-10-000002', 'App\\\\Database\\\\Migrations\\\\CreateJemaatTable', 'default', 'App', UNIX_TIMESTAMP(), 1)");
    echo "   ✓ Migration table berhasil diupdate\n\n";

    echo "✅ Selesai! Tabel jemaat sudah siap digunakan.\n";
    echo "\nSekarang Anda bisa jalankan seeder:\n";
    echo "php spark db:seed JemaatSeeder\n";

    $mysqli->close();

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
