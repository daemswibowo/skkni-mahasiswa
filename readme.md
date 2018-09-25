# Mahasiswa

Aplikasi ini menggunakan Framework laravel v5.7. `Controller` dan `Model` ada pada folder `app` dan `view` ada di folder `resources/views`.
Untuk informasi lebih lanjut mengenai struktur folder bisa dilihat <a href="https://laravel.com/docs/5.7/structure">di sini</a>. Server requirements bisa dilihat <a href="https://laravel.com/docs/5.7/#server-requirements">di sini</a>

# Development Configuration

Setelah clone repositori ini, jalankan perintah berikut ini:
```bash
cd skkni-mahasiswa
cp .env.example .env
php artisan key:generate
composer install
```

Buka file `.env` untuk mengubah konfigurasi database, sesuaikan dengan database anda
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
## Migrasi database

```bash
php artisan migrate
```

Jalankan perintah berikut untuk run development server:
```bash
php artisan serve
```
kemudian akses di browser di `http://localhost:8000`