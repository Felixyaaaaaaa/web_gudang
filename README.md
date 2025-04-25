
# 📦 Sistem Manajemen Gudang

Aplikasi manajemen gudang berbasis web untuk mengelola data produk, barang masuk/keluar, lokasi penyimpanan, dan laporan stok. Cocok untuk kebutuhan inventaris usaha kecil atau menengah.

## 🚀 Fitur Utama

- ✨ Manajemen data produk
- 📥 Pencatatan barang masuk
- 📤 Pencatatan barang keluar
- 📍 Pengelolaan lokasi gudang
- 📊 Pembuatan laporan gudang
- 🔐 (Opsional) Autentikasi pengguna

## 🛠️ Teknologi yang Digunakan

- PHP (Native)
- MySQL / MariaDB
- HTML & Bootstrap
- JavaScript

## 📂 Struktur Direktori

```
/barang_masuk     - Modul untuk barang masuk  
/barang_keluar    - Modul untuk barang keluar  
/produk           - Modul data produk  
/lokasi           - Modul lokasi penyimpanan  
/laporan          - Modul laporan gudang  
/template         - Template tampilan antarmuka  
index.php         - Halaman utama aplikasi  
koneksi.php       - File koneksi ke database  
```

## 🧪 Cara Menjalankan

1. Clone atau download repositori ini.
2. Letakkan folder `gudang` di direktori `htdocs` (jika menggunakan XAMPP) atau `www` (jika menggunakan Laragon).
3. Jalankan server lokal kamu (Apache + MySQL).
4. Buat database baru melalui phpMyAdmin, lalu impor file SQL:
   - **File SQL**: `database.sql` (pastikan kamu sudah menempatkannya di folder project atau folder khusus)
5. Akses aplikasi melalui browser:
   ```
   http://localhost/gudang
   ```

## 📝 Catatan

- Sistem ini masih dapat dikembangkan lebih lanjut seperti menambahkan fitur login, filter laporan, hingga cetak PDF.
- Struktur sederhana memudahkan pengembangan dan pemahaman bagi pemula.

## 🙌 Kontribusi

Pull request dan feedback sangat diterima. Silakan fork dan sesuaikan sesuai kebutuhanmu.
