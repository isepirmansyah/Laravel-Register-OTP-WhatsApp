<p align="center">
    <a href="https://moonwa.id" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel 12 Moonwa OTP Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel 12 Register OTP WhatsApp dengan Moonwa

Repository ini berisi implementasi sistem **Registrasi User dengan Verifikasi OTP WhatsApp** menggunakan Framework **Laravel 12** dan **[Moonwa Gateway API](https://moonwa.id)**.

Proyek ini dirancang untuk mempercepat pengembangan aplikasi yang membutuhkan validasi nomor WhatsApp (Real-time OTP) dengan biaya terjangkau dan integrasi yang sangat mudah.

---

## 📑 Daftar Isi

Navigasi cepat untuk instalasi dan konfigurasi:

-   [Fitur Utama](#-fitur-utama)
-   [Prasyarat Sistem](#-prasyarat-sistem)
-   [Panduan Instalasi (Step-by-Step)](`-panduan-instalasi-step-by-step`)
    -   [1. Persiapan Database](#1-persiapan-database)
    -   [2. Clone & Install Dependencies](#2-clone--install-dependencies)
    -   [3. Konfigurasi Environment (.env)](#3-konfigurasi-environment-env)
    -   [4. Setup Moonwa API](#4-setup-moonwa-api)
    -   [5. Migrasi Database](#5-migrasi-database)
-   [Struktur Kode](#-struktur-kode)
-   [Cara Penggunaan](#-cara-penggunaan)
-   [Lisensi](#-lisensi)

---

## ✨ Fitur Utama

-   **Laravel 12 Ready:** Menggunakan struktur terbaru dari Laravel.
-   **Moonwa Integration:** Kirim pesan OTP instan via WhatsApp.
-   **Secure OTP:** Kode 6 digit acak dengan masa berlaku (expired time).
-   **Middleware Protection:** Mencegah user yang belum verifikasi WA untuk masuk ke dashboard.
-   **Auto Login:** Otomatis login setelah OTP valid.

## ⚙️ Prasyarat Sistem

Sebelum memulai, pastikan komputer Anda telah terinstall:

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   Database MySQL / MariaDB
-   Akun aktif di **[Moonwa.id](https://moonwa.id)** (untuk mendapatkan API Key)

---

## 🚀 Panduan Instalasi (Step-by-Step)

Ikuti langkah-langkah berikut secara berurutan agar aplikasi berjalan lancar.

### 1. Persiapan Database

Sebelum menyentuh kodingan, buatlah database kosong terlebih dahulu di MySQL/phpMyAdmin Anda.

-   Buka terminal database atau phpMyAdmin.
-   Buat database baru, misalnya bernama: `db_otp_whatsapp`

### 2. Clone & Install Dependencies

Download source code dan install library yang dibutuhkan.

```bash
# Clone repository ini
git clone [https://github.com/username-anda/laravel-register-otp-moonwa.git](https://github.com/username-anda/laravel-register-otp-moonwa.git)

# Masuk ke folder project
cd laravel-register-otp-moonwa

# Install dependensi PHP (Composer)
composer install

# Install dependensi Frontend (NPM)
npm install && npm run build
```

### 3. Konfigurasi Environment (.env)

Salin file .env.example menjadi .env dan generate key:

```bash
cp .env.example .env
php artisan key:generate
```

Buka file .env dan sesuaikan konfigurasi berikut. PENTING: Pastikan konfigurasi Database dan Moonwa API Key sudah benar.

Cuplikan kode

```bash
APP_NAME=Laravel
APP_URL=http://localhost
APP_LOCALE=id
APP_FALLBACK_LOCALE=id

# --- KONFIGURASI DATABASE ---
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_otp_whatsapp  <-- Masukkan nama DB yang dibuat di langkah 1
DB_USERNAME=root             <-- Username DB Anda
DB_PASSWORD=                 <-- Password DB Anda

# --- KONFIGURASI MOONWA ---
MOONWA_API_KEY="masukkan_api_key_moonwa_anda_disini"
MOONWA_API_URL="[https://api.moonwa.id/api/send-message](https://api.moonwa.id/api/send-message)"
```

### 4. Migrasi Database

Jalankan migrasi untuk membuat tabel users beserta kolom pendukung OTP:

```bahs
php artisan migrate
```

## 📖 Cara Penggunaan

1. Jalankan server lokal:

```bash
php artisan serve
```

2. Buka browser di http://localhost:8000/register.

3. Isi form pendaftaran. Masukkan nomor WhatsApp dengan format internasional atau lokal (contoh: 081234567890 atau 62812...).

4. Cek WhatsApp Anda. Moonwa akan mengirimkan pesan berisi kode unik.

5. Masukkan kode tersebut di halaman verifikasi web.

6. Selesai! Anda akan diarahkan ke Dashboard.

## 📄 Lisensi

Proyek ini adalah perangkat lunak open-source di bawah MIT license.

<p align="center"> <strong>Powered by <a href="https://moonwa.id">Moonwa.id</a></strong>

Solusi WhatsApp Gateway API & Notifikasi Real-time Indonesia. </p>
