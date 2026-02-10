<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Kegiatan Akan Datang
            [
                'judul_kegiatan' => 'Ibadah Kaum Bapak',
                'deskripsi' => 'Ibadah rutin bulanan Kaum Bapak dengan tema "Menjadi Kepala Keluarga yang Bertanggung Jawab"',
                'kategori' => 'Kaum Bapak',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('+5 days')),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:00:00',
                'lokasi' => 'Gereja GBIS Anugerah',
                'pembicara' => 'Pdt. Samuel Hutabarat',
                'jumlah_peserta' => 50,
                'status' => 'Akan Datang',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Persekutuan Kaum Ibu',
                'deskripsi' => 'Persekutuan doa dan sharing Kaum Ibu dengan tema "Perempuan Bijaksana Membangun Rumahnya"',
                'kategori' => 'Kaum Ibu',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('+7 days')),
                'waktu_mulai' => '14:00:00',
                'waktu_selesai' => '16:00:00',
                'lokasi' => 'Aula Gereja GBIS Anugerah',
                'pembicara' => 'Ibu Maria Siahaan',
                'jumlah_peserta' => 60,
                'status' => 'Akan Datang',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Pemuda Berkarya',
                'deskripsi' => 'Kegiatan sosial pemuda: Bakti sosial ke panti asuhan',
                'kategori' => 'Pemuda',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('+10 days')),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '14:00:00',
                'lokasi' => 'Panti Asuhan Kasih Sayang',
                'pembicara' => null,
                'jumlah_peserta' => 30,
                'status' => 'Akan Datang',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Sekolah Minggu Spesial',
                'deskripsi' => 'Sekolah Minggu dengan tema "Yesus Sahabatku" - Aktivitas mewarnai dan menyanyi',
                'kategori' => 'Anak-anak',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('+3 days')),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:00:00',
                'lokasi' => 'Ruang Sekolah Minggu',
                'pembicara' => 'Kakak Ruth Simbolon',
                'jumlah_peserta' => 40,
                'status' => 'Akan Datang',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Kebaktian Minggu Umum',
                'deskripsi' => 'Kebaktian Minggu dengan tema "Kasih yang Sempurna Melenyapkan Ketakutan"',
                'kategori' => 'Umum',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('next Sunday')),
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '12:00:00',
                'lokasi' => 'Gereja GBIS Anugerah',
                'pembicara' => 'Pdt. Daniel Panjaitan',
                'jumlah_peserta' => 200,
                'status' => 'Akan Datang',
                'status_aktif' => 1,
            ],
            
            // Kegiatan Selesai
            [
                'judul_kegiatan' => 'Retreat Pemuda 2026',
                'deskripsi' => 'Retreat pemuda 3 hari 2 malam dengan tema "Generasi yang Mengasihi Tuhan"',
                'kategori' => 'Pemuda',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('-14 days')),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '17:00:00',
                'lokasi' => 'Camp Danau Toba',
                'pembicara' => 'Pdt. Yohanes Sitompul',
                'jumlah_peserta' => 45,
                'status' => 'Selesai',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Natal Anak 2025',
                'deskripsi' => 'Perayaan Natal Anak dengan drama dan penampilan paduan suara anak',
                'kategori' => 'Anak-anak',
                'tanggal_kegiatan' => '2025-12-25',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '12:00:00',
                'lokasi' => 'Gereja GBIS Anugerah',
                'pembicara' => 'Kakak Debora Manurung',
                'jumlah_peserta' => 80,
                'status' => 'Selesai',
                'status_aktif' => 1,
            ],
            [
                'judul_kegiatan' => 'Seminar Keluarga Kristen',
                'deskripsi' => 'Seminar membangun keluarga Kristen yang harmonis',
                'kategori' => 'Umum',
                'tanggal_kegiatan' => date('Y-m-d', strtotime('-30 days')),
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '17:00:00',
                'lokasi' => 'Aula Gereja GBIS Anugerah',
                'pembicara' => 'Dr. Petrus Hutapea',
                'jumlah_peserta' => 120,
                'status' => 'Selesai',
                'status_aktif' => 1,
            ],
        ];

        // Insert data
        $this->db->table('kegiatan')->insertBatch($data);
    }
}
