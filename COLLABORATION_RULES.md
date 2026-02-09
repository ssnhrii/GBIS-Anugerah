# Aturan Kolaborasi Project GBIS Anugerah

## 📋 Informasi Project

- **Nama Project**: Website GBIS Anugerah
- **Framework**: CodeIgniter 4
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 5, jQuery

---

## 🚀 Sebelum Memulai

### 1. Setup Environment

- Clone repository ke local machine
- Copy file `backend/env` menjadi `backend/.env`
- Sesuaikan konfigurasi database di `.env`
- Jalankan `composer install` di folder `backend/`
- Import database (jika ada file SQL)

### 2. Tools yang Diperlukan

- PHP 7.4 atau lebih tinggi
- Composer
- MySQL
- Git
- Text Editor/IDE (VS Code)

---

## 📁 Struktur Project

```
backend/
├── app/
│   ├── Controllers/     # Logic controller
│   ├── Models/          # Model database
│   ├── Views/           # Template tampilan
│   │   ├── layouts/     # Header, Footer, dll
│   │   └── pages/       # Halaman-halaman
│   ├── Config/          # Konfigurasi
│   └── Helpers/         # Helper functions
├── public/              # Assets (CSS, JS, Images)
└── writable/            # Cache, logs, uploads
```

---

## 🔧 Aturan Coding

### 1. Penamaan File & Folder

- **Controller**: PascalCase, contoh: `JemaatController.php`
- **Model**: PascalCase + Model, contoh: `JemaatModel.php`
- **View**: lowercase + dash, contoh: `kegiatan-ibadah.php`
- **CSS/JS**: lowercase + dash, contoh: `main-style.css`

### 2. Penamaan Variabel & Function

- **Variabel**: camelCase, contoh: `$namaJemaat`, `$totalKegiatan`
- **Function**: camelCase, contoh: `getDataJemaat()`, `saveKegiatan()`
- **Konstanta**: UPPERCASE, contoh: `BASE_URL`, `DB_NAME`

### 3. Indentasi & Format

- Gunakan 4 spasi untuk indentasi (bukan tab)
- Buka kurung kurawal `{` di baris yang sama
- Tutup kurung kurawal `}` di baris baru
- Spasi setelah koma dalam parameter

```php
// ✅ BENAR
public function getData($id, $type) {
    if ($id > 0) {
        return $this->model->find($id);
    }
}

// ❌ SALAH
public function getData($id,$type)
{
if($id>0){
return $this->model->find($id);
}
}
```

### 4. Komentar

- Gunakan komentar untuk logic yang kompleks
- Gunakan bahasa Indonesia atau Inggris secara konsisten
- Hindari komentar yang tidak perlu

```php
// Ambil data jemaat berdasarkan kategori
$jemaat = $this->jemaatModel->where('kategori', $kategori)->findAll();
```

---

## 🌐 Aturan Bahasa

### Konsistensi Bahasa Indonesia

- Gunakan **Bahasa Indonesia** untuk semua teks di website
- **Kecuali** istilah yang lebih umum dalam Bahasa Inggris:
  - Login, Logout, Dashboard, Email, Password
  - Home (untuk navigasi utama)
  - Subscribe, Newsletter (jika konteks internasional)

### Contoh Penggunaan

```php
// ✅ BENAR
"Masukkan Email Anda"
"Login ke Dashboard"
"Tentang Kami"
"Hubungi Kami"

// ❌ SALAH (inkonsisten)
"Subscribe our newsletter"
"Enter your email"
"Masuk ke Dasbor"
```

---

## 🔀 Git Workflow

### 1. Branch Strategy

- **main/master**: Production-ready code
- **development**: Development branch
- **feature/nama-fitur**: Fitur baru
- **fix/nama-bug**: Perbaikan bug

### 2. Commit Message

Gunakan format yang jelas dan deskriptif:

```
[TYPE] Deskripsi singkat

TYPE:
- feat: Fitur baru
- fix: Perbaikan bug
- style: Perubahan styling/UI
- refactor: Refactoring code
- docs: Update dokumentasi
- chore: Update konfigurasi/dependencies
```

**Contoh:**

```
feat: Tambah halaman galeri dengan filter kategori
fix: Perbaiki bug pagination di halaman jemaat
style: Update tampilan footer dengan bahasa Indonesia
docs: Update README dengan instruksi instalasi
```

### 3. Pull Request (PR)

- Buat PR dari branch feature ke development
- Berikan deskripsi yang jelas tentang perubahan
- Tag reviewer jika diperlukan
- Pastikan tidak ada conflict sebelum merge

### 4. Sebelum Push

```bash
# Pastikan code sudah di-test
# Pastikan tidak ada error
# Pull latest changes dari remote
git pull origin development

# Add & commit changes
git add .
git commit -m "feat: Deskripsi perubahan"

# Push ke remote
git push origin feature/nama-fitur
```

---

## 🧪 Testing

### Sebelum Commit

- [ ] Test semua fitur yang diubah
- [ ] Cek responsive design (mobile, tablet, desktop)
- [ ] Cek browser compatibility (Chrome, Firefox, Safari)
- [ ] Pastikan tidak ada error di console browser
- [ ] Pastikan tidak ada error PHP

### Checklist Halaman

- [ ] Header & Footer tampil dengan benar
- [ ] Navigasi berfungsi dengan baik
- [ ] Form validation berjalan
- [ ] Data tersimpan/terupdate dengan benar
- [ ] Loading image tidak error (404)

---

## 📦 Database

### 1. Naming Convention

- **Tabel**: lowercase + underscore, contoh: `data_jemaat`, `kegiatan_gereja`
- **Kolom**: lowercase + underscore, contoh: `nama_lengkap`, `tanggal_lahir`
- **Primary Key**: `id`
- **Foreign Key**: `nama_tabel_id`, contoh: `jemaat_id`, `kegiatan_id`

### 2. Migration

- Gunakan migration untuk perubahan struktur database
- Jangan langsung edit database production
- Dokumentasikan setiap perubahan

```bash
# Buat migration baru
php spark make:migration add_kategori_to_jemaat

# Jalankan migration
php spark migrate
```

---

## 🎨 Frontend Guidelines

### 1. CSS

- Gunakan class Bootstrap yang sudah ada
- Custom CSS di file terpisah: `public/css/custom.css`
- Hindari inline style kecuali sangat diperlukan
- Gunakan naming yang deskriptif

### 2. JavaScript

- Letakkan script di bagian bawah sebelum `</body>`
- Gunakan jQuery yang sudah tersedia
- Pisahkan logic ke file terpisah jika kompleks
- Hindari inline JavaScript

### 3. Images

- Compress image sebelum upload
- Gunakan format yang sesuai (JPG untuk foto, PNG untuk logo/icon)
- Gunakan lazy loading untuk performa
- Simpan di folder `public/img/` atau `public/images/`

---

## 🔒 Security

### 1. Jangan Commit

- File `.env` (sudah di `.gitignore`)
- Database credentials
- API keys atau secrets
- File backup database

### 2. Validasi Input

- Selalu validasi input dari user
- Gunakan prepared statements untuk query
- Escape output untuk mencegah XSS
- Gunakan CSRF protection CodeIgniter

```php
// ✅ BENAR - Gunakan Query Builder
$this->db->where('id', $id)->get('jemaat');

// ❌ SALAH - Raw query tanpa escape
$this->db->query("SELECT * FROM jemaat WHERE id = $id");
```

---

## 📞 Komunikasi Tim

### 1. Channel Komunikasi

- **WhatsApp Group**: Update harian & diskusi cepat
- **GitHub Issues**: Bug report & feature request
- **GitHub Discussions**: Diskusi teknis & brainstorming

### 2. Meeting

- **Daily Standup** (opsional): Update progress singkat
- **Weekly Review**: Review progress mingguan
- **Sprint Planning**: Planning fitur untuk sprint berikutnya

### 3. Dokumentasi

- Update README.md jika ada perubahan setup
- Dokumentasikan API endpoint jika ada
- Catat keputusan penting di GitHub Wiki

---

## ⚠️ Hal yang Harus Dihindari

### ❌ JANGAN:

1. Push langsung ke branch `main` tanpa review
2. Commit file yang tidak perlu (node_modules, vendor, .env)
3. Hapus code orang lain tanpa diskusi
4. Merge PR sendiri tanpa review
5. Ubah struktur database tanpa koordinasi
6. Hardcode credentials di code
7. Commit code yang belum di-test
8. Gunakan `git push --force` di branch shared

### ✅ LAKUKAN:

1. Pull latest changes sebelum mulai coding
2. Buat branch baru untuk setiap fitur
3. Test code sebelum commit
4. Tulis commit message yang jelas
5. Request review sebelum merge
6. Komunikasikan perubahan besar ke tim
7. Backup database sebelum migration
8. Update dokumentasi jika diperlukan

---

## 🆘 Troubleshooting

### Error Umum

**1. Composer dependencies error**

```bash
cd backend
composer install
composer update
```

**2. Database connection error**

- Cek konfigurasi di `backend/.env`
- Pastikan MySQL/MariaDB running
- Cek username & password database

**3. Permission error (Linux/Mac)**

```bash
chmod -R 777 backend/writable
```

**4. Base URL tidak sesuai**

- Update `app.baseURL` di `backend/.env`

---

## 📚 Resources

### Dokumentasi

- [CodeIgniter 4 Docs](https://codeigniter.com/user_guide/)
- [Bootstrap 5 Docs](https://getbootstrap.com/docs/5.0/)
- [Git Basics](https://git-scm.com/book/en/v2)

### Kontak Tim

- **Project Manager**: [Nama] - [Kontak]
- **Lead Developer**: [Nama] - [Kontak]
- **Designer**: [Nama] - [Kontak]

---

## ✅ Checklist Sebelum Mulai

- [ ] Sudah clone repository
- [ ] Sudah setup environment local
- [ ] Sudah baca semua aturan kolaborasi ini
- [ ] Sudah join channel komunikasi tim
- [ ] Sudah koordinasi dengan PM/Lead Developer
- [ ] Sudah paham Git workflow
- [ ] Sudah test environment berjalan dengan baik

---

**Terakhir diupdate**: [Tanggal]

**Catatan**: Aturan ini bisa berubah sesuai kebutuhan project. Pastikan selalu cek versi terbaru.
