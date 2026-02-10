<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Jalankan semua seeder secara berurutan
        echo "Menjalankan semua seeder...\n\n";
        
        // 1. User Seeder (harus pertama karena diperlukan untuk login)
        echo "1. Menjalankan UserSeeder...\n";
        $this->call('UserSeeder');
        
        // 2. Jemaat Seeder
        echo "2. Menjalankan JemaatSeeder...\n";
        $this->call('JemaatSeeder');
        
        // 3. Kegiatan Seeder
        echo "3. Menjalankan KegiatanSeeder...\n";
        $this->call('KegiatanSeeder');
        
        // 4. Dokumentasi Seeder
        echo "4. Menjalankan DokumentasiSeeder...\n";
        $this->call('DokumentasiSeeder');
        
        // 5. Firman Seeder
        echo "5. Menjalankan FirmanSeeder...\n";
        $this->call('FirmanSeeder');
        
        echo "\n✓ Semua seeder berhasil dijalankan!\n";
    }
}
