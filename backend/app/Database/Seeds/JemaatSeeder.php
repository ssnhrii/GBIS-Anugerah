<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JemaatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Kaum Bapak
            [
                'nama_lengkap' => 'Bapak Petrus Sitompul',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1975-05-15',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Sisingamangaraja No. 45, Medan',
                'nomor_telepon' => '081234567890',
                'email' => 'petrus.sitompul@email.com',
                'kategori' => 'Kaum Bapak',
                'status_pernikahan' => 'Menikah',
                'pekerjaan' => 'Wiraswasta',
                'tanggal_baptis' => '1990-06-10',
                'tanggal_sidi' => '1992-08-15',
                'status_aktif' => 1,
            ],
            [
                'nama_lengkap' => 'Bapak Daniel Simanjuntak',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1980-03-20',
                'tempat_lahir' => 'Pematang Siantar',
                'alamat' => 'Jl. Gatot Subroto No. 12, Medan',
                'nomor_telepon' => '081234567891',
                'email' => 'daniel.simanjuntak@email.com',
                'kategori' => 'Kaum Bapak',
                'status_pernikahan' => 'Menikah',
                'pekerjaan' => 'PNS',
                'tanggal_baptis' => '1995-04-12',
                'tanggal_sidi' => '1997-06-20',
                'status_aktif' => 1,
            ],
            
            // Kaum Ibu
            [
                'nama_lengkap' => 'Ibu Maria Hutabarat',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1978-08-25',
                'tempat_lahir' => 'Tarutung',
                'alamat' => 'Jl. Imam Bonjol No. 78, Medan',
                'nomor_telepon' => '081234567892',
                'email' => 'maria.hutabarat@email.com',
                'kategori' => 'Kaum Ibu',
                'status_pernikahan' => 'Menikah',
                'pekerjaan' => 'Guru',
                'tanggal_baptis' => '1993-05-18',
                'tanggal_sidi' => '1995-07-22',
                'status_aktif' => 1,
            ],
            [
                'nama_lengkap' => 'Ibu Ruth Siahaan',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1982-11-10',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Sudirman No. 34, Medan',
                'nomor_telepon' => '081234567893',
                'email' => 'ruth.siahaan@email.com',
                'kategori' => 'Kaum Ibu',
                'status_pernikahan' => 'Menikah',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'tanggal_baptis' => '1997-03-15',
                'tanggal_sidi' => '1999-05-20',
                'status_aktif' => 1,
            ],
            
            // Pemuda
            [
                'nama_lengkap' => 'Yohanes Panjaitan',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2000-02-14',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Pemuda No. 56, Medan',
                'nomor_telepon' => '081234567894',
                'email' => 'yohanes.panjaitan@email.com',
                'kategori' => 'Pemuda',
                'status_pernikahan' => 'Belum Menikah',
                'pekerjaan' => 'Mahasiswa',
                'tanggal_baptis' => '2015-04-10',
                'tanggal_sidi' => '2017-06-15',
                'status_aktif' => 1,
            ],
            [
                'nama_lengkap' => 'Debora Simbolon',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2002-07-22',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Veteran No. 23, Medan',
                'nomor_telepon' => '081234567895',
                'email' => 'debora.simbolon@email.com',
                'kategori' => 'Pemuda',
                'status_pernikahan' => 'Belum Menikah',
                'pekerjaan' => 'Mahasiswa',
                'tanggal_baptis' => '2017-05-12',
                'tanggal_sidi' => '2019-07-18',
                'status_aktif' => 1,
            ],
            
            // Anak-anak
            [
                'nama_lengkap' => 'Samuel Hutapea',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2015-09-05',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Pahlawan No. 67, Medan',
                'nomor_telepon' => '081234567896',
                'email' => null,
                'kategori' => 'Anak-anak',
                'status_pernikahan' => 'Belum Menikah',
                'pekerjaan' => 'Pelajar',
                'tanggal_baptis' => '2020-08-20',
                'tanggal_sidi' => null,
                'status_aktif' => 1,
            ],
            [
                'nama_lengkap' => 'Ester Manurung',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2016-12-18',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Kartini No. 89, Medan',
                'nomor_telepon' => '081234567897',
                'email' => null,
                'kategori' => 'Anak-anak',
                'status_pernikahan' => 'Belum Menikah',
                'pekerjaan' => 'Pelajar',
                'tanggal_baptis' => '2021-09-15',
                'tanggal_sidi' => null,
                'status_aktif' => 1,
            ],
        ];

        // Insert data
        $this->db->table('jemaat')->insertBatch($data);
    }
}
