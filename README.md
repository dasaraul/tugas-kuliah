## Deskripsi 
Ini adalah aplikasi **Manajemen Tugas Kuliah** yang memungkinkan pengguna untuk mengelola dan mengunggah tugas kuliah mereka. Pengguna dapat menambahkan, mengedit, dan menghapus tugas serta mengunduh file tugas. Proyek ini dirancang untuk membantu mahasiswa dalam mengorganisir tugas mereka dengan lebih baik.

## Fitur Utama
1. **Autentikasi Pengguna**:
   - Pengguna dapat **login** dan **register** untuk mengakses fitur admin.
   - Jika sudah login, pengguna bisa melihat dan mengelola tugas.

2. **Manajemen Tugas**:
   - Pengguna dapat **menambahkan** hingga 5 tugas sekaligus untuk satu mata kuliah.
   - Setiap tugas dapat di-upload dalam bentuk file yang bisa diunduh.
   - Pengguna bisa **mengedit** tugas yang sudah ada.
   - Tugas dapat **dihapus** dari daftar jika tidak diperlukan lagi.

3. **Tampilan Responsif**:
   - Aplikasi dirancang untuk tampil dengan baik di berbagai ukuran layar.
   - Desain yang bersih dan intuitif memudahkan navigasi.

4. **Notifikasi**:
   - Konfirmasi muncul saat pengguna mencoba menghapus tugas, untuk menghindari penghapusan yang tidak disengaja.

5. **Pengunggahan File**:
   - Pengguna dapat mengunggah file tugas dengan ukuran yang wajar, dan setiap file diupload akan diberi nama unik agar tidak terjadi konflik.

## Struktur Proyek
Berikut adalah struktur folder dan file dalam proyek ini:

```
/tugas-kuliah
|-- /assets
|   |-- /css
|   |   |-- style.css
|   |-- /uploads
|-- /config
|   |-- database.php
|-- /functions
|   |-- auth.php
|   |-- tugas.php
|-- /admin
|   |-- dashboard.php
|   |-- edit.php
|   |-- tambah.php
|   |-- delete.php
|-- /auth
|   |-- login.php
|   |-- register.php
|-- index.php
|-- logout.php
```

## Instalasi
1. **Clone Repository**:
   - Salin repositori ini ke komputer Anda.
   ```bash
   git clone <repository-url>
   ```

2. **Instalasi Database**:
   - Pastikan Anda memiliki server lokal seperti XAMPP atau MAMP.
   - Buat database baru di MySQL dengan nama `db_tugas_kuliah`.
   - Import file SQL yang terdapat di folder `config` jika ada.

3. **Konfigurasi Database**:
   - Sesuaikan pengaturan koneksi database di file `config/database.php` sesuai dengan pengaturan lokal Anda.

4. **Jalankan Aplikasi**:
   - Akses aplikasi melalui browser dengan mengunjungi `http://localhost/tugas-kuliah/index.php`.


## Cara Menggunakan
1. **Login / Register**:
   - Jika Anda adalah pengguna baru, silakan klik tombol **Register** untuk membuat akun.
   - Jika sudah memiliki akun, klik **Login** dan masukkan kredensial Anda.

2. **Mengelola Tugas**:
   - Setelah login, Anda dapat menambahkan tugas baru dengan mengklik tombol **Tambah Tugas**.
   - Isi form dengan nama tugas, mata kuliah, dan unggah file tugas.
   - Anda dapat mengedit tugas yang sudah ada atau menghapusnya jika tidak diperlukan lagi.

3. **Download Tugas**:
   - Klik tombol **Download** di samping tugas untuk mengunduh file tugas.

## Catatan Penting
- Pastikan ukuran file tugas tidak terlalu besar agar tidak mengganggu proses upload.
- Gunakan nama file yang deskriptif agar mudah dikenali.

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan buat *pull request* atau buka *issue* jika ada bug atau saran perbaikan.

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## 👤 Kredit
- **Telegram**: [@ImTamaa](https://t.me/ImTamaa)
- **Website Owner**: [jawanich.my.id](https://jawanich.my.id/)
