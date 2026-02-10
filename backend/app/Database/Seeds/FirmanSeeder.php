<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FirmanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Renungan Harian
            [
                'judul' => 'Kasih yang Sempurna Melenyapkan Ketakutan',
                'ayat_alkitab' => '1 Yohanes 4:18',
                'isi_ayat' => 'Di dalam kasih tidak ada ketakutan: kasih yang sempurna melenyapkan ketakutan; sebab ketakutan mengandung hukuman dan barangsiapa takut, ia tidak sempurna di dalam kasih.',
                'isi_renungan' => 'Dalam kehidupan sehari-hari, kita sering dihadapkan pada berbagai ketakutan. Takut akan masa depan, takut akan kegagalan, takut akan penolakan. Namun Firman Tuhan mengingatkan kita bahwa kasih Allah yang sempurna dapat melenyapkan segala ketakutan kita. Ketika kita mengenal dan mengalami kasih Allah yang begitu besar, kita akan memiliki keberanian untuk menghadapi setiap tantangan hidup. Mari kita belajar untuk lebih mengenal kasih Allah dan membiarkan kasih-Nya memenuhi hati kita, sehingga ketakutan tidak lagi menguasai hidup kita.',
                'penulis' => 'Pdt. Daniel Panjaitan',
                'tanggal_publikasi' => date('Y-m-d'),
                'kategori' => 'Renungan Harian',
                'status' => 'Terbit',
                'jumlah_views' => 45,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Bersyukur dalam Segala Hal',
                'ayat_alkitab' => '1 Tesalonika 5:18',
                'isi_ayat' => 'Mengucap syukurlah dalam segala hal, sebab itulah yang dikehendaki Allah di dalam Kristus Yesus bagi kamu.',
                'isi_renungan' => 'Bersyukur bukan hanya ketika kita menerima berkat, tetapi juga dalam setiap keadaan. Tuhan mengajar kita untuk bersyukur dalam segala hal karena Dia tahu bahwa sikap syukur akan membawa damai sejahtera dalam hati kita. Ketika kita bersyukur, kita mengakui bahwa Tuhan berkuasa atas hidup kita dan Dia selalu bekerja untuk kebaikan kita. Mari kita mulai hari ini dengan ucapan syukur kepada Tuhan atas segala berkat-Nya.',
                'penulis' => 'Pdt. Samuel Hutabarat',
                'tanggal_publikasi' => date('Y-m-d', strtotime('-1 day')),
                'kategori' => 'Renungan Harian',
                'status' => 'Terbit',
                'jumlah_views' => 38,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Tuhan adalah Gembalaku',
                'ayat_alkitab' => 'Mazmur 23:1',
                'isi_ayat' => 'TUHAN adalah gembalaku, takkan kekurangan aku.',
                'isi_renungan' => 'Mazmur 23 adalah salah satu mazmur yang paling dikenal dan disukai. Daud menggambarkan Tuhan sebagai gembala yang baik yang memelihara domba-domba-Nya. Sebagai gembala, Tuhan menuntun kita ke tempat yang aman, memberi kita makanan rohani, dan melindungi kita dari bahaya. Ketika kita percaya bahwa Tuhan adalah gembala kita, kita tidak perlu khawatir tentang kebutuhan kita karena Dia akan memenuhi semuanya. Mari kita percaya sepenuhnya kepada Tuhan sebagai gembala kita.',
                'penulis' => 'Ibu Maria Siahaan',
                'tanggal_publikasi' => date('Y-m-d', strtotime('-2 days')),
                'kategori' => 'Renungan Harian',
                'status' => 'Terbit',
                'jumlah_views' => 52,
                'status_aktif' => 1,
            ],
            
            // Renungan Minggu
            [
                'judul' => 'Hidup dalam Terang Kristus',
                'ayat_alkitab' => 'Yohanes 8:12',
                'isi_ayat' => 'Maka Yesus berkata pula kepada orang banyak, kata-Nya: "Akulah terang dunia; barangsiapa mengikut Aku, ia tidak akan berjalan dalam kegelapan, melainkan ia akan mempunyai terang hidup."',
                'isi_renungan' => 'Yesus adalah terang dunia yang menerangi jalan hidup kita. Dalam dunia yang penuh dengan kegelapan dosa, Yesus datang membawa terang kebenaran dan keselamatan. Ketika kita mengikut Yesus, kita tidak lagi berjalan dalam kegelapan kebingungan dan dosa, tetapi kita memiliki terang hidup yang menuntun setiap langkah kita. Terang Kristus memberikan kita pengharapan, sukacita, dan tujuan hidup yang jelas. Mari kita hidup dalam terang Kristus dan menjadi terang bagi orang lain.',
                'penulis' => 'Pdt. Yohanes Sitompul',
                'tanggal_publikasi' => date('Y-m-d', strtotime('last Sunday')),
                'kategori' => 'Renungan Minggu',
                'status' => 'Terbit',
                'jumlah_views' => 67,
                'status_aktif' => 1,
            ],
            [
                'judul' => 'Kasih Karunia yang Melimpah',
                'ayat_alkitab' => 'Efesus 2:8-9',
                'isi_ayat' => 'Sebab karena kasih karunia kamu diselamatkan oleh iman; itu bukan hasil usahamu, tetapi pemberian Allah, itu bukan hasil pekerjaanmu: jangan ada orang yang memegahkan diri.',
                'isi_renungan' => 'Keselamatan adalah anugerah kasih karunia Allah yang diberikan secara cuma-cuma kepada kita. Kita tidak bisa mendapatkan keselamatan melalui usaha atau perbuatan baik kita sendiri. Keselamatan adalah pemberian Allah yang kita terima melalui iman kepada Yesus Kristus. Kasih karunia Allah begitu besar sehingga Dia rela mengorbankan Anak-Nya yang tunggal untuk menyelamatkan kita. Mari kita merespons kasih karunia Allah dengan hidup yang berkenan kepada-Nya dan membagikan kasih karunia itu kepada orang lain.',
                'penulis' => 'Pdt. Daniel Panjaitan',
                'tanggal_publikasi' => date('Y-m-d', strtotime('-7 days')),
                'kategori' => 'Renungan Minggu',
                'status' => 'Terbit',
                'jumlah_views' => 58,
                'status_aktif' => 1,
            ],
            
            // Artikel Rohani
            [
                'judul' => 'Membangun Keluarga Kristen yang Kokoh',
                'ayat_alkitab' => 'Yosua 24:15',
                'isi_ayat' => 'Tetapi jika kamu anggap tidak baik untuk beribadah kepada TUHAN, pilihlah pada hari ini kepada siapa kamu akan beribadah; allah yang kepadanya nenek moyangmu beribadah di seberang sungai Efrat, atau allah orang Amori yang negerinya kamu diami ini. Tetapi aku dan seisi rumahku, kami akan beribadah kepada TUHAN!',
                'isi_renungan' => 'Keluarga adalah unit terkecil dalam masyarakat dan gereja. Membangun keluarga Kristen yang kokoh memerlukan komitmen untuk menempatkan Tuhan sebagai kepala keluarga. Yosua memberikan teladan yang luar biasa dengan menyatakan bahwa dia dan seisi rumahnya akan beribadah kepada Tuhan. Dalam keluarga Kristen, kita perlu membangun fondasi yang kuat melalui doa bersama, membaca Firman Tuhan, dan saling mengasihi. Ketika Tuhan menjadi pusat keluarga, keluarga kita akan kokoh menghadapi setiap tantangan.',
                'penulis' => 'Dr. Petrus Hutapea',
                'tanggal_publikasi' => date('Y-m-d', strtotime('-10 days')),
                'kategori' => 'Artikel Rohani',
                'status' => 'Terbit',
                'jumlah_views' => 89,
                'status_aktif' => 1,
            ],
            
            // Kesaksian
            [
                'judul' => 'Tuhan Memulihkan Keluargaku',
                'ayat_alkitab' => 'Yeremia 29:11',
                'isi_ayat' => 'Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan.',
                'isi_renungan' => 'Beberapa tahun yang lalu, keluarga kami mengalami masa-masa yang sangat sulit. Masalah keuangan, kesehatan, dan hubungan keluarga membuat kami hampir putus asa. Namun di tengah kesulitan itu, kami belajar untuk lebih bergantung kepada Tuhan. Kami rajin berdoa bersama dan mencari kehendak Tuhan. Perlahan tapi pasti, Tuhan mulai memulihkan keluarga kami. Hari ini, kami dapat bersaksi bahwa Tuhan sungguh setia dan rancangan-Nya selalu baik bagi kita. Jangan pernah menyerah, karena Tuhan memiliki rencana yang indah untuk hidup kita.',
                'penulis' => 'Bpk. Andreas Simbolon',
                'tanggal_publikasi' => date('Y-m-d', strtotime('-5 days')),
                'kategori' => 'Kesaksian',
                'status' => 'Terbit',
                'jumlah_views' => 73,
                'status_aktif' => 1,
            ],
            
            // Draft
            [
                'judul' => 'Berjalan dalam Iman',
                'ayat_alkitab' => '2 Korintus 5:7',
                'isi_ayat' => 'Sebab hidup kami ini adalah hidup karena percaya, bukan karena melihat.',
                'isi_renungan' => 'Iman adalah dasar dari kehidupan Kristen. Kita dipanggil untuk berjalan dalam iman, bukan berdasarkan apa yang kita lihat dengan mata jasmani. Berjalan dalam iman berarti percaya kepada janji-janji Tuhan meskipun keadaan tampak tidak mendukung. Ini adalah draft yang akan dilengkapi lebih lanjut...',
                'penulis' => 'Pdt. Samuel Hutabarat',
                'tanggal_publikasi' => date('Y-m-d', strtotime('+3 days')),
                'kategori' => 'Renungan Harian',
                'status' => 'Draft',
                'jumlah_views' => 0,
                'status_aktif' => 1,
            ],
        ];

        // Insert data
        $this->db->table('firman')->insertBatch($data);
    }
}
