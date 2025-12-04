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
