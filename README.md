<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="100" alt="Laravel logo">
</p>

<h1 align="center">📊 Aplikasi Keuangan Pribadi – Dibangun dengan Laravel 12</h1>

<p align="center">
  Aplikasi pencatatan transaksi keuangan pribadi yang mudah digunakan, dibangun dengan Laravel 12. Dirancang dan dikembangkan oleh Luckyauars untuk membantu individu dalam mengelola pemasukan, pengeluaran, serta menghasilkan laporan keuangan secara real-time.
</p>

---

## 💼 Deskripsi Aplikasi

**Aplikasi Keuangan Pribadi** adalah alat manajemen keuangan yang komprehensif dan mudah digunakan. Aplikasi ini dirancang untuk membantu individu menjaga kesehatan keuangan dengan cara yang sederhana dan efisien. Dengan fitur pencatatan pemasukan dan pengeluaran, aplikasi ini memungkinkan pengguna untuk:

- Mencatat transaksi keuangan mereka.
- Mengkategorikan setiap pemasukan dan pengeluaran.
- Melihat laporan keuangan secara real-time.

Dibangun menggunakan framework **Laravel 12**, aplikasi ini menjamin kinerja yang handal, keamanan yang terjaga, dan kemudahan dalam mengelola data keuangan yang sensitif.

---

## 🚀 Fitur Utama

- **Pencatatan Pemasukan dan Pengeluaran**  
  Mudah mencatat dan mengkategorikan transaksi keuangan dengan formulir yang sederhana dan intuitif.

- **Laporan Keuangan Real-Time**  
  Mendapatkan laporan langsung dengan grafik dan diagram yang memperlihatkan kinerja keuangan Anda.

- **Antarmuka Pengguna yang Ramah**  
  Desain aplikasi yang bersih, responsif, dan mudah digunakan di berbagai perangkat.

- **Keamanan Tinggi**  
  Sistem autentikasi berbasis peran yang aman memastikan hanya pengguna yang berwenang yang dapat mengakses data keuangan.

- **Pembaharuan Data Real-Time**  
  Setiap transaksi yang Anda masukkan akan langsung diperbarui dan dapat dilihat dalam laporan keuangan.

- **Kategori yang Dapat Dikustomisasi**  
  Sesuaikan kategori pemasukan dan pengeluaran sesuai dengan kebutuhan Anda.

- **Laporan yang Dapat Diekspor**  
  Menghasilkan laporan dalam format PDF yang dapat diunduh dan digunakan untuk catatan pribadi Anda.

---

## 🚀 Cara Menjalankan Proyek

### 1. Clone Repositori

```bash
git clone https://github.com/luckyauars/web-keuangan.git
cd web-keuangan

2. Instal Dependensi
Pastikan Anda telah menginstal Composer, lalu jalankan perintah berikut untuk menginstal dependensi PHP yang dibutuhkan:

bash
Copy
Edit
composer install
3. Siapkan Lingkungan
Salin file .env.example menjadi .env:

bash
Copy
Edit
cp .env.example .env
Buat kunci aplikasi Laravel:

bash
Copy
Edit
php artisan key:generate
4. Konfigurasi Database
Buat database baru, kemudian perbarui file .env dengan kredensial database Anda:

env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=nama_pengguna_database_anda
DB_PASSWORD=kata_sandi_database_anda
Jalankan migrasi untuk menyiapkan tabel database:

bash
Copy
Edit
php artisan migrate
5. Jalankan Aplikasi
Untuk memulai server pengembangan, jalankan perintah berikut:

bash
Copy
Edit
php artisan serve
Akses aplikasi Anda melalui http://127.0.0.1:8000 di browser.

🔒 Keamanan
Aplikasi ini dirancang dengan fokus pada keamanan data. Semua data keuangan yang sensitif disimpan dengan aman, dan hanya pengguna yang berwenang yang dapat mengaksesnya berkat sistem autentikasi yang terjamin.

🚀 Mengapa Memilih Aplikasi Ini?
1. Mudah Digunakan
Antarmuka yang disederhanakan dan alur kerja yang intuitif menjadikan aplikasi ini sangat mudah digunakan untuk mengelola keuangan pribadi.

2. Laporan yang Kuat dan Detail
Aplikasi ini menyediakan laporan yang akurat dan mendalam, memberikan wawasan yang jelas mengenai keadaan keuangan Anda.

3. Dapat Diskalakan
Dengan Laravel 12, aplikasi ini siap untuk berkembang sesuai dengan kebutuhan Anda. Fitur baru dapat ditambahkan dengan mudah.

4. Ideal untuk Penggunaan Pribadi atau Klien
Aplikasi ini sangat cocok untuk manajemen keuangan pribadi dan dapat disesuaikan untuk klien di sektor jasa keuangan.

🌍 Demo
Cobalah demo aplikasi untuk merasakan seluruh fitur yang ditawarkan oleh Aplikasi Keuangan Pribadi.

📞 Kontak
Tertarik membeli atau menyesuaikan aplikasi ini untuk bisnis Anda? Hubungi Luckyauars melalui:

Instagram: @lucxy.ars

WhatsApp: +6285172042715

Untuk informasi lebih lanjut mengenai harga, dukungan teknis, atau permintaan pengembangan khusus.


