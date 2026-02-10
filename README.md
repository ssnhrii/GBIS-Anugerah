# 🏛️ Website GBIS Anugerah

Website manajemen gereja lengkap dengan Content Management System (CMS) untuk GBIS - Gereja Bethel Indonesia Surabaya.

## 📋 Dokumentasi

### File Dokumentasi Utama:

1. **ATURAN_PROJECT.md** - Aturan dan konvensi project
2. **DAFTAR_FUNGSI_WEBSITE.md** - Daftar lengkap 53 fungsi website
3. **backend/PANDUAN_CONTENT_MANAGEMENT.md** - Panduan CMS lengkap
4. **backend/QUICK_REFERENCE.txt** - Quick reference CMS

## 🚀 Quick Start

### 1. Setup Database
```bash
cd backend
php setup_content_management.php
```

### 2. Akses Website
- **Frontend:** `http://localhost/`
- **Admin Panel:** `http://localhost/admin`
- **Login:** `http://localhost/login`

### 3. Default Admin
- Username: (sesuai database)
- Password: (sesuai database)

## 📁 Struktur Project

```
.
├── backend/
│   ├── app/
│   │   ├── Controllers/     # 5 controllers
│   │   ├── Models/          # 7 models
│   │   ├── Views/           # Frontend & admin views
│   │   ├── Config/          # Konfigurasi
│   │   ├── Database/        # Migrations & seeders
│   │   ├── Filters/         # Auth filter
│   │   └── Helpers/         # Helper functions
│   ├── public/              # Assets (CSS, JS, images)
│   └── writable/            # Logs & cache
├── ATURAN_PROJECT.md        # Aturan project
└── DAFTAR_FUNGSI_WEBSITE.md # Dokumentasi fungsi
```

## ✨ Fitur Utama

### 🌐 Frontend (12 Halaman)
- ✅ Home - Halaman utama
- ✅ Sejarah - Timeline gereja
- ✅ Jemaat - 5 halaman (Umum, Bapak, Ibu, Pemuda, Anak)
- ✅ Kegiatan - Kalender & list kegiatan
- ✅ Galeri/Dokumentasi - Foto & video
- ✅ Firman - Renungan & artikel rohani

### 🔐 Backend (41 Fungsi)
- ✅ Dashboard dengan statistik
- ✅ Manajemen Jemaat (CRUD)
- ✅ Manajemen Kegiatan (CRUD)
- ✅ Manajemen Dokumentasi (CRUD + Upload)
- ✅ Manajemen Firman (CRUD)
- ✅ Content Management System (8 halaman)
- ✅ Kelola Info Situs (kontak, sosmed)
- ✅ User Management (CRUD admin)

## 🗄️ Database

7 Tabel:
- `users` - User authentication
- `jemaat` - Data jemaat
- `kegiatan` - Data kegiatan
- `dokumentasi` - Foto & video
- `firman` - Renungan & artikel
- `page_contents` - CMS konten halaman
- `site_settings` - Pengaturan situs

## 🔒 Keamanan

- ✅ Password hashing
- ✅ Session-based authentication
- ✅ Auth filter untuk proteksi routes
- ✅ XSS protection
- ✅ SQL injection protection
- ✅ Input validation
- ✅ Role-based access

## 📊 Teknologi

- **Framework:** CodeIgniter 4
- **Frontend:** HTML, CSS (design-system.css), JavaScript
- **Database:** MySQL
- **Template:** Bootstrap 5 (Admin)
- **Icons:** Font Awesome

## 📖 Panduan Lengkap

Lihat file dokumentasi:
- **DAFTAR_FUNGSI_WEBSITE.md** - 53 fungsi lengkap dengan status
- **ATURAN_PROJECT.md** - Konvensi & best practices
- **backend/PANDUAN_CONTENT_MANAGEMENT.md** - Cara menggunakan CMS

## 🎯 Status

**✅ FULLY FUNCTIONAL - SIAP PRODUCTION**

- Total Fungsi: 53
- Status: 100% Berfungsi
- Security: Basic security implemented
- Documentation: Complete

## 👥 Tim Pengembang

- Chris J. Sembiring - [chrisjericho.my.id](https://chrisjericho.my.id)
- Berkat T. Siallagan - [berkat.my.id](http://berkat.my.id)

## 📝 License

Dibuat untuk GBIS Anugerah - 2026

---

**Untuk informasi lebih detail, lihat DAFTAR_FUNGSI_WEBSITE.md**
