<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJemaatTable extends Migration
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
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Kaum Bapak', 'Kaum Ibu', 'Pemuda', 'Anak-anak'],
            ],
            'status_pernikahan' => [
                'type' => 'ENUM',
                'constraint' => ['Belum Menikah', 'Menikah', 'Duda', 'Janda'],
                'null' => true,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_baptis' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_sidi' => [
                'type' => 'DATE',
                'null' => true,
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
        $this->forge->createTable('jemaat');
    }

    public function down()
    {
        $this->forge->dropTable('jemaat');
    }
}
