# 🔒 Fitur Lockout Login dengan Countdown Timer

## Deskripsi

Fitur keamanan yang menonaktifkan tombol login setelah 5x percobaan gagal dengan tampilan countdown timer real-time.

---

## ✨ Fitur Utama

### 1. **Disable Button Login**

- Button login otomatis disabled setelah 5x percobaan gagal
- Button berubah warna menjadi merah (btn-danger)
- Cursor berubah menjadi `not-allowed` saat hover
- Tidak bisa diklik sama sekali

### 2. **Countdown Timer Real-time**

- Menampilkan sisa waktu dalam format MM:SS
- Update setiap detik secara otomatis
- Tampil di button: "Terkunci (14:59)"
- Tampil di bawah button: "Coba lagi dalam 14 menit 59 detik"

### 3. **Visual Feedback**

- Icon lock (🔒) pada button yang terkunci
- Warna merah untuk indikasi bahaya
- Pesan warning dengan icon exclamation
- Tooltip saat hover: "Akun terkunci. Tunggu hingga waktu habis."

### 4. **Auto Unlock**

- Button otomatis unlock setelah countdown selesai
- Halaman auto-reload untuk reset session
- Kembali ke state normal (warna biru)

---

## 🎯 Cara Kerja

### Backend (AuthController.php)

```php
// Kirim data lockout ke view
$data = [
    'isLocked' => true/false,
    'remainingTime' => 900, // dalam detik
    'loginAttempts' => 3
];
```

### Frontend (login.php)

```javascript
// Baca data dari button attributes
data-is-locked="true"
data-remaining-time="900"

// Countdown timer
setInterval(updateCountdown, 1000);

// Format waktu: MM:SS
formatTime(seconds) => "14:59"
```

---

## 📊 Tampilan UI

### State Normal

```
┌─────────────────────────┐
│   🔓 Login              │  ← Biru, bisa diklik
└─────────────────────────┘
```

### State Terkunci

```
┌─────────────────────────┐
│   🔒 Terkunci (14:59)   │  ← Merah, disabled
└─────────────────────────┘
⚠️ Akun terkunci. Coba lagi dalam 14 menit 59 detik
```

### State Loading

```
┌─────────────────────────┐
│   ⏳ Memproses...       │  ← Biru, disabled
└─────────────────────────┘
```

---

## 🔧 Konfigurasi

### Waktu Lockout

```php
// AuthController.php
private $lockoutTime = 900; // 15 menit (900 detik)
```

### Maksimal Percobaan

```php
// AuthController.php
private $maxLoginAttempts = 5;
```

---

## 🎨 Styling CSS

```css
/* Button disabled state */
.btn-danger:disabled {
  cursor: not-allowed;
  opacity: 0.8;
}

.btn-danger:disabled:hover {
  transform: none;
  box-shadow: none;
}
```

---

## 📱 Responsive

- ✅ Desktop: Tampilan penuh dengan countdown
- ✅ Tablet: Tampilan optimal
- ✅ Mobile: Countdown tetap terlihat jelas

---

## 🔐 Keamanan

1. **Client-side Protection**
   - Button disabled (tidak bisa diklik)
   - Form submit dicegah dengan `e.preventDefault()`
   - Alert jika mencoba submit saat locked

2. **Server-side Protection**
   - Session-based lockout
   - Validasi di controller sebelum proses login
   - Redirect dengan error message

3. **Double Protection**
   - Client-side: UX yang baik
   - Server-side: Keamanan yang kuat

---

## 🧪 Testing

### Test Case 1: Login Gagal 5x

1. Masukkan username/password salah
2. Submit 5x
3. Button harus disabled dan countdown muncul
4. Coba klik button → tidak bisa
5. Tunggu countdown selesai → button unlock

### Test Case 2: Refresh Page

1. Login gagal 5x (button locked)
2. Refresh page (F5)
3. Button tetap locked dengan countdown
4. Countdown continue dari waktu tersisa

### Test Case 3: Browser Back

1. Login gagal 5x
2. Navigate ke halaman lain
3. Klik browser back
4. Button tetap locked dengan countdown

---

## 📝 Changelog

### Version 1.0 (11 Feb 2026)

- ✅ Disable button setelah 5x gagal
- ✅ Countdown timer real-time (MM:SS)
- ✅ Visual feedback (warna merah, icon lock)
- ✅ Tooltip saat hover
- ✅ Auto unlock setelah countdown selesai
- ✅ Auto reload page setelah unlock
- ✅ Prevent form submit saat locked
- ✅ Responsive design

---

## 🎯 User Experience

### Sebelum

```
❌ Login gagal 5x
❌ Button masih bisa diklik
❌ Tidak ada indikasi visual yang jelas
❌ User bingung kenapa tidak bisa login
```

### Sesudah

```
✅ Login gagal 5x
✅ Button disabled dengan countdown
✅ Visual feedback yang jelas (merah + lock icon)
✅ User tahu harus tunggu berapa lama
✅ Countdown update setiap detik
✅ Auto unlock setelah selesai
```

---

## 💡 Tips

1. **Jangan refresh page** saat countdown berjalan (countdown akan continue)
2. **Tunggu hingga countdown selesai** untuk auto unlock
3. **Hubungi admin** jika lupa password (jangan coba-coba terus)

---

**Status:** ✅ PRODUCTION READY
**Tested:** ✅ Desktop, Tablet, Mobile
**Browser:** ✅ Chrome, Firefox, Edge, Safari
