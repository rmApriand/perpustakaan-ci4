📚 LibraryPro – Aplikasi Perpustakaan Berbasis CodeIgniter 4

🚀 Apa itu LibraryPro?

LibraryPro adalah aplikasi web sederhana berbasis CodeIgniter 4 yang digunakan untuk mengelola aktivitas perpustakaan. Aplikasi ini dibagi menjadi dua peran utama:

👨‍💼 Admin – mengelola data buku, mencatat peminjaman, dan pengembalian.

👤 User – melihat daftar buku yang tersedia dan riwayat peminjaman pribadi.


Dirancang ringan dan cepat untuk kebutuhan internal perpustakaan sekolah, kampus, atau kantor kecil.


---

⚙️ Fitur Utama

🛠️ Admin Panel

CRUD Data Buku

Input & Kelola Transaksi Peminjaman

Riwayat Pengembalian

Dashboard ringkasan aktivitas


📖 User Panel

Lihat Stok Buku Tersedia

Lihat Riwayat Peminjaman Pribadi

Cek status peminjaman (masih dipinjam / sudah dikembalikan)



---

🧱 Teknologi yang Digunakan

PHP 8.x

CodeIgniter 4 Framework

MySQL

Bootstrap 5 (UI)

SweetAlert (Feedback interaktif)



---

💻 Instalasi

1. Clone repository

git clone https://github.com/username/librarypro.git

2. Pindahkan folder ke dalam web server

XAMPP → letakkan di htdocs/librarypro

Laragon → letakkan di www/librarypro


3. Buat database

Nama database: library_db

Import file library_db.sql dari folder /database


4. Konfigurasi file .env

Buka file .env (atau duplikat dari .env.example) dan sesuaikan database:

database.default.hostname = localhost
database.default.database = library_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

5. Jalankan di browser

http://localhost/librarypro/public


---

🔒 Login Akun Default

Role	Username	Password

Admin	admin	admin123
User	user	user123


> Gantilah password setelah login untuk alasan keamanan.




---

🖼️ Tampilan Aplikasi

📚 Dashboard Admin


📘 Tampilan User


(Silakan ganti dengan screenshot asli aplikasi LibraryPro kamu)


---

📦 Persyaratan Sistem

PHP 8.0 atau lebih tinggi

MySQL / MariaDB

Composer (opsional, jika menggunakan fitur autoload tambahan)

Apache/Nginx

Browser modern



---

📜 Lisensi

Aplikasi ini menggunakan lisensi MIT.
Silakan gunakan dan modifikasi untuk keperluan pribadi, instansi, atau edukasi.


---

🙋 Bantuan & Pengembangan

Jika kamu tertarik untuk berkontribusi atau mengalami kendala saat instalasi, silakan hubungi:
📬 Telegram: @rama