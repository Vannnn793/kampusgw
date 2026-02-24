<img src="[Vannnn793/amazon-henshin.svg](https://raw.githubusercontent.com/Vannnn793/Vannnn793/refs/heads/main/amazon-henshin.svg)" width="100%">


# 🏛️ Website Informasi & Profil Kampus (Laravel)

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

Website profil dinamis yang dirancang untuk mempublikasikan informasi terkini, prestasi, dan galeri aktivitas kampus secara real-time. Proyek ini dikembangkan selama masa magang saya di **CV. Gama Creative Studio**.

---

## 👨‍💻 Peran & Kontribusi (Team Lead)
Sebagai **Lead Developer**, saya bertanggung jawab atas siklus hidup pengembangan aplikasi (SDLC), meliputi:
* **Project Management:** Mengatur pembagian tugas tim dan memastikan timeline pengerjaan sesuai target.
* **Database Arch:** Merancang skema database MySQL untuk performa yang optimal.
* **Core Development:** Membangun fitur utama Back-end menggunakan Laravel.
* **Reviewer:** Melakukan *code review* untuk memastikan kualitas dan keamanan kode tim.

## 🚀 Fitur Utama
- **Dynamic Dashboard:** Ringkasan statistik konten untuk Admin.
- **Content Management System (CMS):** Pengelolaan artikel berita, prestasi, dan agenda kampus secara CRUD.
- **Image Gallery:** Upload dan manajemen dokumentasi kegiatan kampus.
- **Role-Based Access:** Sistem keamanan login khusus untuk 1 user Admin utama.
- **SEO Friendly:** Struktur URL dan konten yang dioptimalkan untuk mesin pencarian.

## 🛠️ Tech Stack
- **Backend:** PHP 8.x & Laravel Framework
- **Frontend:** Blade Engine, CSS (Bootstrap/Tailwind), JavaScript
- **Database:** MySQL
- **Tools:** Git, Composer, NPM

## 📋 Prasyarat (Prerequisites)
Pastikan perangkat Anda sudah terinstall:
* PHP >= 8.1
* Composer
* MySQL / XAMPP

## ⚙️ Cara Instalasi
1. **Clone Repository:**
   ```bash
   git clone [https://github.com/Vannnn793/kampusgw.git](https://github.com/Vannnn793/kampusgw.git)
   cd kampusgw
   composer install
   npm install && npm run dev
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
Akses di: http://127.0.0.1:8000
