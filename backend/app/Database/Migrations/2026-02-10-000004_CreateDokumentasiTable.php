<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokumentasiTable extends Migration
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
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Foto', 'Video'],
            ],
            'jenis_kegiatan' => [
                'type' => 'ENUM',
                'constraint' => ['Kaum Bapak', 'Kaum Ibu', 'Pemuda', 'Anak-anak', 'Umum', 'Ibadah', 'Lainnya'],
            ],
            'file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'file_size' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_kegiatan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'fotografer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jumlah_views' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
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
        $this->forge->createTable('dokumentasi');
    }

    public function down()
    {
        $this->forge->dropTable('dokumentasi');
    }
}
