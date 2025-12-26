Website TaskTrack

Deskripsi :
TaskTrack adalah aplikasi web sederhana berbasis CRUD yang digunakan untuk mencatat dan memnatau tugas individu.
Aplikasi ini belum bersifat non-publik karena belum memilikki fitur login, namun dapat dapat saya kembangkan lagi menjadi aplikasi publik dengan fitur autentikasi pengguna.

Aplikasi ini dibuat untuk :
* Menerapkan konsep dasar web programing
* Memahami alur client server
* Mengimplementasikan CRUD
* Menggunakan PHP native dan MYSQL
* Membuat aplikasi sederhana yang menyerupai aplikasi nyata

Fitur yang terdapat :
* Menampilkan daftar tugas
* Menambahkan tugas baru
* Mengedit tugas
* Mengubah status tugas (baru, dikerjakan, selesai)
* Menghapus tugas yang sudah tidak diperlukan
* Mencari tugas berdasarkan judul di kolom pencarian

Tools yang digunakan :
* Frontend : HTML, CSS
* Backend : PHP Native
* Database : MySQL
* Tools Pendukung : Laragon, Git

Struktur Folder :
tracking_task/
├── config/          # Konfigurasi database
├── pages/index.php  # Halaman aplikasi/halaman utama
├── process/         # Proses CRUD
├── assets/          # CSS dan JavaScript
├── sql/             # File database.sql
└── README.md

Struktur Database :
terdapat 3 tabel yaitu..
1. users → menyimpan data pengguna
2. tasks → menyimpan data tugas
3. pembaruan_status → menyimpan riwayat perubahan status tugas
Struktur ini disiapkan untuk pengelolaan data dan pengembangan fitur lanjutan.

Kemungkin fitur yang bisa ditambahkan :
* Sistem login dan autentikasi
* Role pengguna (admin/user)
* Riwayat aktivitas lebih detail
* Tampilan responsif untuk mobile
