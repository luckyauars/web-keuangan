<p align="center"> <img src="https://laravel.com/img/logomark.min.svg" width="100" alt="Laravel logo"> </p> <h1 align="center">📊 Aplikasi Keuangan Pribadi – Dibangun dengan Laravel 12</h1> <p align="center"> Aplikasi pencatatan transaksi keuangan pribadi yang mudah digunakan, dibangun dengan Laravel 12. Dirancang dan dikembangkan oleh Luckyauars untuk membantu individu dalam mengelola pemasukan, pengeluaran, dan menghasilkan laporan keuangan secara real-time. </p>
💼 Deskripsi
Aplikasi Keuangan Pribadi adalah alat manajemen keuangan all-in-one untuk individu yang ingin menjaga kesehatan keuangan mereka. Aplikasi ini memungkinkan pengguna untuk mencatat, mengkategorikan, dan menganalisis pemasukan dan pengeluaran mereka dengan mudah. Aplikasi ini juga menyediakan laporan transaksi secara real-time, yang membantu pengguna mendapatkan wawasan tentang kebiasaan pengeluaran dan menabung untuk tujuan masa depan.

Platform ini dibangun di atas framework Laravel 12 yang handal, memastikan kinerja, keamanan, dan keandalan untuk mengelola data keuangan yang sensitif.

🚀 Fitur
Pencatatan Pemasukan dan Pengeluaran: Mudah mencatat dan mengkategorikan transaksi dengan formulir yang sederhana.

Laporan Keuangan Real-Time: Mendapatkan wawasan instan dengan grafik dan diagram yang menunjukkan kinerja keuangan.

Antarmuka Pengguna yang Ramah: Desain yang bersih, intuitif, dan responsif untuk penggunaan yang lancar di berbagai perangkat.

Autentikasi yang Aman: Kontrol akses berbasis peran dengan login dan pengelolaan kata sandi yang aman.

Data Real-Time: Pembaruan real-time untuk membantu Anda tetap memantau keuangan Anda.

Kategori yang Dapat Dikustomisasi: Menyesuaikan kategori pemasukan dan pengeluaran sesuai kebutuhan Anda.

Laporan yang Dapat Diekspor: Menghasilkan laporan PDF yang dapat diunduh untuk catatan keuangan Anda.

🚀 Cara Menjalankan Proyek
1. Clone Repositori
bash
Copy
Edit
git clone https://github.com/luckyauars/web-keuangan.git
cd web-keuangan
2. Instal Dependensi
Pastikan Anda telah menginstal Composer, kemudian jalankan perintah berikut untuk menginstal dependensi PHP yang diperlukan:

bash
Copy
Edit
composer install
3. Siapkan Lingkungan
Salin file .env.example ke .env:

bash
Copy
Edit
cp .env.example .env
Buat kunci aplikasi:

bash
Copy
Edit
php artisan key:generate
4. Siapkan Database
Buat database dan perbarui file .env dengan kredensial database Anda:

env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=nama_pengguna_database_anda
DB_PASSWORD=kata_sandi_database_anda
Jalankan perintah migrasi untuk menyiapkan tabel database:

bash
Copy
Edit
php artisan migrate
5. Jalankan Aplikasi
Mulai server pengembangan:

bash
Copy
Edit
php artisan serve
Kunjungi aplikasi di http://127.0.0.1:8000 untuk mulai menggunakan aplikasi keuangan pribadi Anda!

🔒 Keamanan
Aplikasi ini memperhatikan keamanan dengan serius. Semua data keuangan yang sensitif disimpan dengan aman, dan sistem autentikasi memastikan hanya pengguna yang berwenang yang dapat mengakses catatan keuangan mereka.

🚀 Mengapa Memilih Aplikasi Ini?
1. Mudah Digunakan: Antarmuka yang disederhanakan dan alur kerja yang intuitif untuk manajemen keuangan yang mudah.
2. Laporan yang Kuat: Pelacakan real-time dan laporan mendalam yang memberi pengguna wawasan untuk membuat keputusan keuangan yang lebih baik.
3. Dapat Diskalakan: Dibangun dengan Laravel 12, aplikasi ini dapat diskalakan dan dengan mudah disesuaikan untuk fitur keuangan di masa depan.
4. Ideal untuk Penggunaan Pribadi atau Klien: Aplikasi ini sangat cocok untuk manajemen keuangan pribadi dan dapat disesuaikan untuk klien di industri jasa keuangan.

🌍 Demo
Silakan coba demo aplikasi untuk merasakan fitur lengkap dari Aplikasi Keuangan Pribadi.

📞 Kontak
Tertarik membeli atau menyesuaikan aplikasi ini untuk bisnis Anda? Hubungi Luckyauars melalui:

Instagram: @lucxy.ars

WhatsApp: +6285172042715

Untuk informasi harga, dukungan, atau permintaan pengembangan khusus.
