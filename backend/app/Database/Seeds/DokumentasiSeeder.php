<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DokumentasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Foto Kegiatan
            [
                'judul' => 'Ibadah Kaum Bapak Januari 2026',
                'deskripsi' => 'Dokumentasi ibadah rutin Kaum Bapak dengan tema "Menjadi Kepala Keluarga yang Bertanggung Jawab"',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Kaum Bapak',
                'file_path' => 'img/about-1.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 245000,
                'tanggal_kegiatan' => '2026-01-15',
                'fotografer' => 'Tim Dokumentasi GBIS',
                'jumlah_views' => 45,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Persekutuan Kaum Ibu',
                'deskripsi' => 'Persekutuan doa dan sharing Kaum Ibu dengan penuh sukacita',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Kaum Ibu',
                'file_path' => 'img/about-2.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 198000,
                'tanggal_kegiatan' => '2026-01-20',
                'fotografer' => 'Ibu Maria Siahaan',
                'jumlah_views' => 38,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Retreat Pemuda 2026',
                'deskripsi' => 'Retreat pemuda 3 hari 2 malam di Camp Danau Toba - Moment penuh berkat',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Pemuda',
                'file_path' => 'img/about-3.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 312000,
                'tanggal_kegiatan' => '2026-01-26',
                'fotografer' => 'Yohanes Panjaitan',
                'jumlah_views' => 67,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Sekolah Minggu Spesial',
                'deskripsi' => 'Anak-anak sekolah minggu belajar tentang kasih Yesus dengan penuh sukacita',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Anak-anak',
                'file_path' => 'img/about-child.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 276000,
                'tanggal_kegiatan' => '2026-02-02',
                'fotografer' => 'Kakak Ruth Simbolon',
                'jumlah_views' => 52,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Kebaktian Minggu',
                'deskripsi' => 'Kebaktian Minggu dengan pujian dan penyembahan yang merdu',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Ibadah',
                'file_path' => 'img/blog-1.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 289000,
                'tanggal_kegiatan' => '2026-02-08',
                'fotografer' => 'Tim Dokumentasi GBIS',
                'jumlah_views' => 89,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Natal Anak 2025',
                'deskripsi' => 'Perayaan Natal Anak dengan drama dan penampilan paduan suara yang memukau',
                'kategori' => 'Foto',
                'jenis_kegiatan' => 'Anak-anak',
                'file_path' => 'img/blog-2.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => 334000,
                'tanggal_kegiatan' => '2025-12-25',
                'fotografer' => 'Kakak Debora Manurung',
                'jumlah_views' => 124,
                'status_aktif' => 1,
            ],
            
            // Video Kegiatan
            [
                'judul' => 'Highlight Retreat Pemuda 2026',
                'deskripsi' => 'Video highlight kegiatan retreat pemuda yang penuh berkat dan kebersamaan',
                'kategori' => 'Video',
                'jenis_kegiatan' => 'Pemuda',
                'file_path' => 'https://www.youtube.com/watch?v=example1',
                'file_type' => 'video/youtube',
                'file_size' => null,
                'tanggal_kegiatan' => '2026-01-26',
                'fotografer' => 'Tim Media GBIS',
                'jumlah_views' => 156,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Kebaktian Minggu - Pujian dan Penyembahan',
                'deskripsi' => 'Rekaman kebaktian minggu dengan pujian dan penyembahan yang luar biasa',
                'kategori' => 'Video',
                'jenis_kegiatan' => 'Ibadah',
                'file_path' => 'https://www.youtube.com/watch?v=example2',
                'file_type' => 'video/youtube',
                'file_size' => null,
                'tanggal_kegiatan' => '2026-02-08',
                'fotografer' => 'Tim Media GBIS',
                'jumlah_views' => 203,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Bakti Sosial Pemuda',
                'deskripsi' => 'Dokumentasi kegiatan bakti sosial pemuda ke panti asuhan',
                'kategori' => 'Video',
                'jenis_kegiatan' => 'Pemuda',
                'file_path' => 'https://www.youtube.com/watch?v=example3',
                'file_type' => 'video/youtube',
                'file_size' => null,
                'tanggal_kegiatan' => '2026-01-18',
                'fotografer' => 'Debora Simbolon',
                'jumlah_views' => 98,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Seminar Keluarga Kristen',
                'deskripsi' => 'Rekaman lengkap seminar membangun keluarga Kristen yang harmonis',
                'kategori' => 'Video',
                'jenis_kegiatan' => 'Umum',
                'file_path' => 'https://www.youtube.com/watch?v=example4',
                'file_type' => 'video/youtube',
                'file_size' => null,
                'tanggal_kegiatan' => '2026-01-10',
                'fotografer' => 'Tim Media GBIS',
                'jumlah_views' => 187,
                'status_aktif' => 1,
            ],
        ];

        // Insert data
        $this->db->table('dokumentasi')->insertBatch($data);
    }
}
