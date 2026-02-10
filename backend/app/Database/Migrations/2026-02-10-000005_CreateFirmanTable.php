<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFirmanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ayat_alkitab' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'isi_ayat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'isi_renungan' => [
                'type' => 'TEXT',
            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_publikasi' => [
                'type' => 'DATE',
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Renungan Harian', 'Renungan Minggu', 'Artikel Rohani', 'Kesaksian', 'Lainnya'],
                'default' => 'Renungan Harian',
            ],
            'gambar_cover' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jumlah_views' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Draft', 'Terbit'],
                'default' => 'Draft',
            ],
            'status_aktif' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('firman');
    }

    public function down()
    {
        $this->forge->dropTable('firman');
    }
}
