# Content Management System - GBIS Anugerah

## 🚀 Quick Start

### 1. Setup Database

```bash
cd backend
php setup_content_management.php
```

### 2. Akses Menu Admin

Login ke dashboard admin, lalu buka menu **Pengaturan** yang memiliki 3 submenu:

1. **Kelola Konten** - Edit konten semua halaman website
2. **Informasi Situs** - Edit kontak, alamat, sosial media
3. **Kelola Admin** - Tambah/edit/hapus admin

## 📋 Fitur Utama

### ✅ Kelola Konten Halaman

- Edit konten 8 halaman: Home, Sejarah, Jemaat, Jemaat Bapak/Ibu/Pemuda/Anak, Galeri
- Support HTML untuk formatting
- Meta description untuk SEO
- Status aktif/nonaktif

### ✅ Informasi Situs

- Nama situs
- Email, telepon, WhatsApp
- Alamat lengkap
- Link sosial media (Facebook, Instagram, YouTube, Twitter)

### ✅ Kelola Admin

- Tambah admin baru dengan username, email, password
- Edit data admin dan ubah password
- Hapus admin (tidak bisa hapus diri sendiri)
- Role management (admin/superadmin)

## 🔧 Struktur File

```
backend/
├── app/
│   ├── Controllers/
│   │   └── SettingsController.php      # Controller untuk settings
│   ├── Models/
│   │   ├── PageContentModel.php        # Model konten halaman
│   │   └── SiteSettingModel.php        # Model pengaturan situs
│   ├── Views/
│   │   └── admin/
│   │       └── settings/               # Views untuk admin settings
│   │           ├── page_list.php
│   │           ├── page_edit.php
│   │           ├── site_info.php
│   │           ├── admin_list.php
│   │           ├── admin_add.php
│   │           └── admin_edit.php
│   └── Helpers/
│       └── content_helper.php          # Helper functions
├── setup_content_management.php        # Script setup database
└── PANDUAN_CONTENT_MANAGEMENT.md       # Dokumentasi lengkap
```

## 📊 Database Tables

### page_contents

Menyimpan konten semua halaman website

### site_settings

Menyimpan informasi kontak dan pengaturan situs

## 🔐 Keamanan

- ✅ Auth filter untuk semua route settings
- ✅ Input validation dan sanitization
- ✅ Password hashing
- ✅ XSS protection
- ✅ CSRF protection

## 📖 Dokumentasi Lengkap

Lihat file `PANDUAN_CONTENT_MANAGEMENT.md` untuk dokumentasi lengkap dan contoh penggunaan.

## 🎯 Workflow Setelah Publish

1. **Admin login** ke dashboard
2. **Edit konten** melalui menu Pengaturan > Kelola Konten
3. **Update informasi** melalui menu Pengaturan > Informasi Situs
4. **Kelola admin** melalui menu Pengaturan > Kelola Admin
5. **Tidak perlu coding** - semua bisa dikelola dari dashboard!

## ✨ Keunggulan

- ✅ **User-friendly** - Interface mudah digunakan
- ✅ **No coding required** - Edit konten tanpa buka kode
- ✅ **Secure** - Dilindungi dengan authentication dan validation
- ✅ **Flexible** - Support HTML untuk konten yang lebih kaya
- ✅ **SEO-friendly** - Meta description untuk setiap halaman
- ✅ **Multi-admin** - Kelola banyak admin dengan mudah

---

**Dibuat untuk:** GBIS Anugerah Website
**Tanggal:** 2024
