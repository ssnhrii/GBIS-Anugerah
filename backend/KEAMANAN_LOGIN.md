# 🔒 Dokumentasi Keamanan Sistem Login

## Status: ✅ AMAN & TERHUBUNG DATABASE

Sistem login sudah terhubung dengan database dan dilengkapi dengan berbagai proteksi keamanan.

---

## 🛡️ Fitur Keamanan yang Sudah Diterapkan

### 1. **Password Security**

- ✅ Password di-hash menggunakan `password_hash()` dengan algoritma bcrypt (PASSWORD_DEFAULT)
- ✅ Verifikasi password menggunakan `password_verify()`
- ✅ Auto-hash saat insert/update user di database
- ✅ Minimum 6 karakter password

### 2. **Brute Force Protection**

- ✅ Maksimal 5 percobaan login gagal
- ✅ Account lockout selama 15 menit setelah 5x gagal
- ✅ Tracking login attempts di session
- ✅ Notifikasi sisa percobaan login
- ✅ Logging security events

### 3. **CSRF Protection**

- ✅ CSRF token di setiap form (`<?= csrf_field() ?>`)
- ✅ Validasi CSRF token di controller
- ✅ Token regeneration setiap submit
- ✅ CSRF protection aktif global (baru ditambahkan)

### 4. **SQL Injection Protection**

- ✅ Menggunakan CodeIgniter Query Builder (prepared statements)
- ✅ Automatic escaping di semua query
- ✅ Model-based database access

### 5. **XSS Protection**

- ✅ Input sanitization dengan `strip_tags()`
- ✅ Output escaping dengan `esc()` di views
- ✅ Invalid characters filter aktif (baru ditambahkan)

### 6. **Session Security**

- ✅ Session hijacking detection (IP & User Agent validation)
- ✅ Session timeout 30 menit inactivity
- ✅ Proper session destroy saat logout
- ✅ Session regeneration saat login

### 7. **Input Validation**

- ✅ Username: 3-50 karakter, hanya alphanumeric & underscore
- ✅ Password: 6-100 karakter
- ✅ Email validation
- ✅ Server-side & client-side validation

### 8. **Cookie Security (Remember Me)**

- ✅ Secure flag (HTTPS only)
- ✅ HttpOnly flag (tidak bisa diakses JavaScript)
- ✅ SameSite: Strict (CSRF protection)
- ✅ Expiry 30 hari

### 9. **Security Headers**

- ✅ Secure headers filter aktif (baru ditambahkan)
- ✅ X-Frame-Options, X-XSS-Protection, dll

### 10. **Authentication Filter**

- ✅ Middleware untuk proteksi halaman admin
- ✅ Auto-redirect ke login jika belum login
- ✅ Role-based access control

---

## 📊 Alur Keamanan Login

```
1. User submit form login
   ↓
2. CSRF Token Validation
   ↓
3. Input Sanitization & Validation
   ↓
4. Check Account Lockout Status
   ↓
5. Query Database (Prepared Statement)
   ↓
6. Password Verification (bcrypt)
   ↓
7. Check User Active Status
   ↓
8. Create Secure Session
   ↓
9. Set Remember Me Cookie (optional)
   ↓
10. Redirect ke Dashboard
```

---

## 🔧 Konfigurasi Keamanan

### File: `backend/app/Config/Security.php`

```php
- CSRF Protection: AKTIF (cookie-based)
- Token Regeneration: AKTIF
- CSRF Expires: 7200 detik (2 jam)
```

### File: `backend/app/Config/Filters.php`

```php
- CSRF Filter: AKTIF (global)
- Invalid Chars Filter: AKTIF (global)
- Secure Headers: AKTIF (global)
- Auth Filter: AKTIF (untuk /admin/*)
```

### File: `backend/app/Controllers/AuthController.php`

```php
- Max Login Attempts: 5
- Lockout Time: 900 detik (15 menit)
- Session Timeout: 1800 detik (30 menit)
```

---

## 🚨 Proteksi Terhadap Serangan

| Jenis Serangan                    | Status  | Metode Proteksi                        |
| --------------------------------- | ------- | -------------------------------------- |
| SQL Injection                     | ✅ AMAN | Query Builder + Prepared Statements    |
| XSS (Cross-Site Scripting)        | ✅ AMAN | Input sanitization + Output escaping   |
| CSRF (Cross-Site Request Forgery) | ✅ AMAN | CSRF Token validation                  |
| Brute Force                       | ✅ AMAN | Login attempts limit + Account lockout |
| Session Hijacking                 | ✅ AMAN | IP & User Agent validation             |
| Session Fixation                  | ✅ AMAN | Session regeneration saat login        |
| Password Cracking                 | ✅ AMAN | Bcrypt hashing (cost 10)               |
| Clickjacking                      | ✅ AMAN | X-Frame-Options header                 |
| MIME Sniffing                     | ✅ AMAN | X-Content-Type-Options header          |

---

## 📝 Logging & Monitoring

### Security Events yang Di-log:

1. ✅ Login berhasil (dengan IP address)
2. ✅ Logout (dengan username)
3. ✅ Account lockout (dengan IP address)
4. ✅ Possible session hijacking

### Lokasi Log:

```
backend/writable/logs/log-YYYY-MM-DD.log
```

---

## 🔐 Database Schema

### Tabel: `users`

```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- username (VARCHAR, UNIQUE, NOT NULL)
- email (VARCHAR, UNIQUE, NOT NULL)
- password (VARCHAR, NOT NULL) -- Bcrypt hashed
- full_name (VARCHAR)
- role (ENUM: 'admin', 'user')
- is_active (TINYINT, DEFAULT 1)
- created_at (DATETIME)
- updated_at (DATETIME)
```

---

## ✅ Checklist Keamanan

- [x] Password hashing dengan bcrypt
- [x] CSRF protection aktif
- [x] SQL injection protection
- [x] XSS protection
- [x] Brute force protection
- [x] Session security
- [x] Input validation
- [x] Secure cookies
- [x] Security headers
- [x] Authentication middleware
- [x] Session hijacking detection
- [x] Session timeout
- [x] Security logging
- [x] Role-based access control

---

## 🎯 Rekomendasi Tambahan (Opsional)

### 1. Rate Limiting

Tambahkan rate limiting untuk mencegah DDoS:

```php
// Limit: 10 requests per menit per IP
```

### 2. Two-Factor Authentication (2FA)

Tambahkan 2FA untuk keamanan ekstra:

```php
// Google Authenticator / SMS OTP
```

### 3. Password Policy

Tambahkan kebijakan password lebih ketat:

```php
- Minimal 8 karakter
- Harus ada huruf besar, kecil, angka, dan simbol
- Password expiry (ganti setiap 90 hari)
```

### 4. Login History

Simpan riwayat login di database:

```sql
CREATE TABLE login_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    login_time DATETIME,
    status ENUM('success', 'failed')
);
```

### 5. Email Notification

Kirim email saat:

- Login dari IP baru
- Password berhasil diubah
- Account lockout

---

## 📞 Kontak

Jika menemukan celah keamanan, segera hubungi administrator.

---

**Terakhir diperbarui:** 10 Februari 2026
**Status:** PRODUCTION READY ✅
