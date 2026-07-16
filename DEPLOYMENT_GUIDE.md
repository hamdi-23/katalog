# Panduan Deployment Laravel ke cPanel Shared Hosting

Dokumen ini berisi panduan lengkap untuk mengonlinekan aplikasi Katalog Produk ini ke shared hosting cPanel Anda.

---

## Langkah 1: Persiapan File Lokal

Sebelum mengunggah, Anda harus menyiapkan aset dan file agar siap dijalankan di server produksi.

1. **Kompilasi Aset Frontend (CSS/JS):**
   Di komputer lokal Anda (Laragon), jalankan perintah berikut untuk mengompilasi CSS (Tailwind v4) dan JS:
   ```bash
   npm run build
   ```
   Langkah ini penting karena sebagian besar shared hosting tidak menyediakan Node.js/NPM untuk memproses aset secara langsung. Folder `public/build` akan terbuat.

2. **Kompres Proyek ke Format ZIP:**
   Kompres seluruh folder proyek `katalog` menjadi file ZIP (misal: `katalog.zip`).
   > [!TIP]
   > Anda boleh mengecualikan folder `node_modules` dan `vendor` agar ukuran ZIP lebih kecil. Folder `vendor` bisa diinstal ulang di server hosting atau diunggah langsung jika hosting Anda tidak memiliki akses SSH/Composer.

---

## Langkah 2: Mengunggah File ke cPanel

Ada 2 cara yang bisa Anda pilih untuk struktur folder di cPanel:

### Opsi A: Menggunakan file `.htaccess` (Paling Praktis)
Metode ini memanfaatkan file `.htaccess` di root yang telah kita buat untuk mengarahkan lalu lintas ke folder `/public`.

1. Masuk ke **cPanel > File Manager**.
2. Masuk ke folder `public_html`.
3. Unggah file `katalog.zip` ke dalam folder `public_html` lalu Ekstrak (Extract).
4. Pastikan file `.htaccess` yang ada di folder root proyek ikut terekstrak dengan benar.

### Opsi B: Memisahkan Folder Core dan Public (Paling Aman)
Metode ini direkomendasikan untuk keamanan karena menyembunyikan file sensitif (seperti `.env`) di luar akses web publik.

1. Unggah dan ekstrak file `katalog.zip` ke luar folder `public_html` (misal di folder `/home/username/katalog`).
2. Pindahkan seluruh isi dari folder `/home/username/katalog/public/*` ke dalam folder `public_html`.
3. Edit file `public_html/index.php` untuk menyesuaikan path autoload dan app:
   - Cari baris `__DIR__.'/../vendor/autoload.php'` ubah menjadi `__DIR__.'/../katalog/vendor/autoload.php'`
   - Cari baris `__DIR__.'/../bootstrap/app.php'` ubah menjadi `__DIR__.'/../katalog/bootstrap/app.php'`

---

## Langkah 3: Pengaturan Database di cPanel

1. Masuk ke **cPanel > MySQL® Database Wizard**.
2. **Buat Database Baru** (misal: `username_katalog`).
3. **Buat User Database Baru** (misal: `username_user`) dan tentukan password yang aman.
4. **Hubungkan User ke Database** dengan mencentang pilihan **ALL PRIVILEGES**.
5. Edit file `.env` di cPanel File Manager:
   - Sesuaikan konfigurasi database berikut:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=username_katalog
     DB_USERNAME=username_user
     DB_PASSWORD=password_database_anda
     ```
   - Ubah `APP_ENV` ke `production`.
   - Ubah `APP_DEBUG` ke `false`.
   - Pastikan `APP_URL` diisi dengan domain Anda (misal: `https://domainanda.com`).

6. **Impor Database Schema:**
   - Buka **phpMyAdmin** di cPanel.
   - Pilih database `username_katalog`.
   - Klik menu **Import**, pilih file ekspor database dari lokal Anda (atau jalankan perintah migrasi via SSH).

---

## Langkah 4: Membuat Symlink Storage (Penting untuk Foto Produk)

Laravel menyimpan file unggahan secara default di `storage/app/public`. Agar bisa diakses dari web, kita harus menghubungkannya ke folder `public/storage`.

Jika hosting Anda memiliki akses **Terminal** di cPanel:
```bash
ln -s /home/username/public_html/storage/app/public /home/username/public_html/public/storage
```
*(Sesuaikan path di atas sesuai dengan struktur folder yang Anda pilih pada Langkah 2)*.

Jika hosting Anda **tidak memiliki akses Terminal**:
1. Masuk ke **cPanel > Cron Jobs**.
2. Buat Cron Job baru dengan pengaturan sekali jalan (Common Settings: *Once a minute* - lalu hapus setelah sukses dijalankan).
3. Isi Command dengan perintah:
   ```bash
   ln -s /home/username/public_html/storage/app/public /home/username/public_html/public/storage
   ```
4. Klik **Add New Cron Job**. Tunggu 1 menit, lalu hapus kembali cron job tersebut agar tidak berjalan berulang-ulang.

---

## Langkah 5: Optimasi & Verifikasi

1. Buka domain Anda di browser untuk memastikan halaman katalog utama tampil dengan cantik.
2. Akses halaman admin panel di `https://domainanda.com/admin` dan gunakan akun admin yang telah dibuat:
   - **Email:** `admin@gmail.com`
   - **Password:** `admin123`
3. Coba tambah kategori dan produk baru dengan foto untuk memastikan upload gambar dan tautan Shopee/TikTok bekerja dengan sempurna.
