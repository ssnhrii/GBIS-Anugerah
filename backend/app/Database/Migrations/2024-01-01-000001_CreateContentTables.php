<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentTables extends Migration
{
    public function up()
    {
        // Tabel untuk konten halaman
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'page_key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'page_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'meta_description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'is_active' => [
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
        $this->forge->createTable('page_contents');

        // Tabel untuk pengaturan situs (kontak, alamat, dll)
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'setting_key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'setting_value' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'setting_label' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'setting_type' => [
                'type' => 'ENUM',
                'constraint' => ['text', 'textarea', 'email', 'phone', 'url'],
                'default' => 'text',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('site_settings');

        // Insert data default
        $this->db->table('page_contents')->insertBatch([
            [
                'page_key' => 'home',
                'page_title' => 'Beranda',
                'content' => '<h1>Selamat Datang di GBIS</h1><p>Konten beranda...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'sejarah',
                'page_title' => 'Sejarah',
                'content' => '<h1>Sejarah GBIS</h1><p>Konten sejarah...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'jemaat',
                'page_title' => 'Jemaat',
                'content' => '<h1>Jemaat GBIS</h1><p>Konten jemaat...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'jemaat-bapak',
                'page_title' => 'Jemaat Bapak',
                'content' => '<h1>Jemaat Bapak</h1><p>Konten jemaat bapak...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'jemaat-ibu',
                'page_title' => 'Jemaat Ibu',
                'content' => '<h1>Jemaat Ibu</h1><p>Konten jemaat ibu...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'jemaat-pemuda',
                'page_title' => 'Jemaat Pemuda',
                'content' => '<h1>Jemaat Pemuda</h1><p>Konten jemaat pemuda...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'jemaat-anak',
                'page_title' => 'Jemaat Anak',
                'content' => '<h1>Jemaat Anak</h1><p>Konten jemaat anak...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'page_key' => 'galeri',
                'page_title' => 'Galeri',
                'content' => '<h1>Galeri GBIS</h1><p>Konten galeri...</p>',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        $this->db->table('site_settings')->insertBatch([
            [
                'setting_key' => 'site_name',
                'setting_value' => 'GBIS - Gereja Bethel Indonesia Surabaya',
                'setting_label' => 'Nama Situs',
                'setting_type' => 'text',
            ],
            [
                'setting_key' => 'contact_email',
                'setting_value' => 'info@gbis.org',
                'setting_label' => 'Email Kontak',
                'setting_type' => 'email',
            ],
            [
                'setting_key' => 'contact_phone',
                'setting_value' => '(031) 1234567',
                'setting_label' => 'Telepon',
                'setting_type' => 'phone',
            ],
            [
                'setting_key' => 'contact_address',
                'setting_value' => 'Jl. Contoh No. 123, Surabaya',
                'setting_label' => 'Alamat',
                'setting_type' => 'textarea',
            ],
            [
                'setting_key' => 'facebook_url',
                'setting_value' => 'https://facebook.com/gbis',
                'setting_label' => 'Facebook URL',
                'setting_type' => 'url',
            ],
            [
                'setting_key' => 'instagram_url',
                'setting_value' => 'https://instagram.com/gbis',
                'setting_label' => 'Instagram URL',
                'setting_type' => 'url',
            ],
            [
                'setting_key' => 'youtube_url',
                'setting_value' => 'https://youtube.com/gbis',
                'setting_label' => 'YouTube URL',
                'setting_type' => 'url',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('page_contents');
        $this->forge->dropTable('site_settings');
    }
}
