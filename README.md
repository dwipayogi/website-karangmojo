# Website Desa Karangmojo

Website resmi Desa Karangmojo yang dibangun menggunakan framework Laravel untuk memberikan informasi dan layanan digital kepada masyarakat desa.

## Tentang Proyek

Website Desa Karangmojo adalah platform digital yang bertujuan untuk:

-   Menyediakan informasi terkini tentang berita dan kegiatan desa
-   Menampilkan galeri foto dokumentasi kegiatan desa
-   Mempromosikan usaha-usaha lokal milik warga desa
-   Memberikan akses informasi yang mudah dan transparan kepada masyarakat

## Fitur Utama

### Untuk Pengunjung (Public)

-   **Landing Page**: Halaman utama dengan informasi ringkas tentang desa
-   **Berita Desa**: Menampilkan berita dan pengumuman terbaru dari desa
-   **Detail Berita**: Halaman khusus untuk membaca berita secara lengkap
-   **Galeri Foto**: Dokumentasi kegiatan dan foto-foto desa
-   **Direktori Usaha**: Katalog usaha milik warga desa

### Untuk Administrator

-   **Dashboard Admin**: Panel kontrol untuk mengelola konten website
-   **Kelola Berita**: Membuat, mengedit, dan menghapus berita desa
-   **Kelola Usaha**: Mengelola data usaha-usaha lokal warga
-   **Kelola Akun**: Manajemen akun pengguna (khusus Superadmin)
-   **Login/Logout**: Sistem autentikasi yang aman

## Teknologi yang Digunakan

-   **Backend**: Laravel 12.x (PHP 8.2+)
-   **Frontend**: Blade Templates dengan Bootstrap
-   **Database**: MySQL/MariaDB
-   **Authentication**: Laravel Auth dengan Role-based Access Control
-   **Testing**: Pest PHP untuk unit testing
-   **Build Tools**: Vite untuk asset compilation

## Struktur Database

### Model Utama

-   **User**: Manajemen pengguna dengan role-based system
-   **Berita**: Konten berita dan pengumuman desa
-   **Usaha**: Database usaha-usaha lokal warga
-   **Galeri**: Dokumentasi foto kegiatan desa
-   **Pengguna**: Data demografis penduduk

## Instalasi dan Setup

### Persyaratan Sistem

-   PHP 8.2 atau lebih tinggi
-   Composer
-   Node.js & NPM
-   Database MySQL/MariaDB

### Langkah Instalasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/dwipayogi/wesbite-karangmojo.git
    cd wesbite-karangmojo
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Configuration**

    - Buat database baru di MySQL
    - Sesuaikan konfigurasi database di file `.env`
    - Jalankan migrasi:

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5. **Build Assets**

    ```bash
    npm run build
    ```

6. **Storage Link**

    ```bash
    php artisan storage:link
    ```

7. **Jalankan Aplikasi**

    ```bash
    php artisan serve
    ```

    Website akan tersedia di `http://localhost:8000`

## Penggunaan

### Akses Administrator

Untuk mengakses panel admin, kunjungi `/login` dan gunakan kredensial yang telah dibuat melalui seeder atau registrasi.

### Role Pengguna

-   **Superadmin**: Akses penuh ke semua fitur termasuk manajemen akun
-   **Admin**: Akses ke manajemen konten (berita, usaha) tanpa manajemen akun

## Development

### Menjalankan dalam Mode Development

```bash
# Terminal 1 - Laravel Server
php artisan serve

# Terminal 2 - Asset Watcher
npm run dev
```

### Testing

```bash
# Menjalankan semua test
php artisan test

# Atau menggunakan Pest
./vendor/bin/pest
```

## Kontribusi

Silakan berkontribusi untuk pengembangan website desa ini. Pastikan untuk:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -am 'Menambah fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Tim Pengembang

Website ini dikembangkan untuk mendukung digitalisasi pelayanan Desa Karangmojo dan meningkatkan transparansi informasi kepada masyarakat.

## Lisensi

Proyek ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT) - silakan lihat file LICENSE untuk detail lebih lanjut.
