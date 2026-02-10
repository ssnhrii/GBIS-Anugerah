<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatanTable extends Migration
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
            'judul_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Kaum Bapak', 'Kaum Ibu', 'Pemuda', 'Anak-anak', 'Umum'],
            ],
            'tanggal_kegiatan' => [
                'type' => 'DATE',
            ],
            'waktu_mulai' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'waktu_selesai' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'pembicara' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jumlah_peserta' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => 0,
            ],
            'foto_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Akan Datang', 'Sedang Berlangsung', 'Selesai', 'Dibatalkan'],
                'default' => 'Akan Datang',
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
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan');
    }
}
