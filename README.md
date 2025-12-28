## Capstone Project Kelompok 4 - Sistem Informasi Telkom University Purwokerto 2025
Developed by Kelompok 4 - Capstone Project Sistem Informasi Telkom University Purwokerto 2025
Kelompok 4 :
1. Urip Yoga Pangestu (2211103102)
2. Risnawati Sinaga (2211103100)
3. Andi Syafar Ilham (2211103046)

# Refloreo Iterum - Platform E-Commerce Bibit Tanaman

## Deskripsi Project
Refloreo Iterum adalah platform e-commerce yang dikembangkan untuk UMKM pembibitan tanaman di Desa Petir, Kecamatan Kalibagor, Kabupaten Banyumas, Jawa Tengah. Platform ini bertujuan untuk memudahkan pelanggan dalam menjelajahi dan memesan berbagai jenis bibit tanaman unggulan secara online.

## Fitur Utama

### 1. Landing Page
- **Hero Section**: Tampilan visual menarik dengan gambar background dan CTA untuk eksplorasi produk
- **Katalog Produk**: Menampilkan produk berdasarkan kategori (Kayu dan Buah) dengan fitur "Lihat Semua"
- **Section Tentang**: Informasi lengkap tentang perusahaan, layanan, dan keunggulan
- **FAQ Section**: Pertanyaan yang sering diajukan dengan accordion interaktif
- **Footer**: Informasi kontak, social media, menu navigasi, dan maps lokasi

### 2. Manajemen Produk
- Katalog produk dengan sistem kategori dinamis
- Tampilan card produk dengan informasi:
  - Gambar produk
  - Nama dan deskripsi
  - Harga
  - Button WhatsApp untuk inquiry langsung
- Pagination (10 produk per halaman)
- Responsive design untuk mobile dan desktop

### 3. Sistem Navigasi
- Navbar sticky dengan menu:
  - Beranda
  - Bibit (scroll to product section)
  - Tentang (scroll to about section)
- Mobile-friendly hamburger menu
- ScrollSpy untuk active menu highlighting

### 4. Integrasi WhatsApp
- Direct WhatsApp contact di setiap produk
- Pre-filled message template dengan nama produk
- WhatsApp button di section tentang untuk konsultasi umum

### 5. Back to Top Button
- Floating button yang muncul saat scroll
- Smooth scroll animation ke atas halaman

### 6. SEO Ready
- Meta tags untuk social media sharing
- Responsive images dan lazy loading
- Clean URL structure dengan route dinamis

## Teknologi yang Digunakan

### Backend
- **Laravel 12.32.5** - PHP Framework
- **PHP 8.4.14** - Server-side language
- **MySQL** - Database management

### Frontend
- **Blade Template Engine** - Laravel templating
- **Tailwind CSS v4** - Utility-first CSS framework (via CDN)
- **Vanilla JavaScript** - Interactive components

### Database
- Categories (Kategori produk)
- Products (Data produk dengan relasi ke kategori)
- Product Images (Gambar produk dengan relasi many-to-one)
- Users (Sistem autentikasi untuk admin)

## Instalasi

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (optional untuk development)

### Langkah Instalasi

1. **Clone repository**
```bash
git clone https://github.com/timurlauttt/capstone-project.git
cd capstone-project
```

2. **Install dependencies**
```bash
composer install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi database**
- Buat database baru dengan nama `capstone_project`
- Update file `.env`:
```
DB_DATABASE=capstone_project
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Migrasi database**
```bash
php artisan migrate:fresh
```

6. **Seed data (optional)**
```bash
php artisan db:seed
```

7. **Jalankan server**
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

## Struktur Database

### Categories Table
- id (PK)
- name (Nama kategori)
- slug (URL-friendly name)
- timestamps

### Products Table
- id (PK)
- category_id (FK)
- title (Nama produk)
- slug (URL-friendly name)
- description (Deskripsi produk)
- price (Harga)
- stock (Stok tersedia)
- is_visible (Status tampil/hide)
- timestamps

### Product Images Table
- id (PK)
- product_id (FK)
- path (Path file gambar)
- sort_order (Urutan gambar)
- timestamps

## Penggunaan

### Untuk Admin/Owner
1. Login ke system (jika sudah implement auth)
2. Kelola produk melalui dashboard admin
3. Tambah/edit/hapus kategori dan produk
4. Upload gambar produk
5. Atur visibility produk

### Untuk Customer
1. Kunjungi homepage
2. Browse produk berdasarkan kategori
3. Klik "Lihat Semua" untuk melihat semua produk dalam kategori
4. Klik icon WhatsApp di produk untuk inquiry
5. Hubungi admin melalui WhatsApp untuk pemesanan
6. Gunakan FAQ section untuk informasi umum

## Roadmap & Future Development
- [ ] Sistem autentikasi admin
- [ ] Dashboard admin untuk CRUD produk
- [ ] Shopping cart functionality
- [ ] Payment gateway integration
- [ ] Order management system
- [ ] Customer review & rating
- [ ] Search & filter products
- [ ] Multi-language support

## Contact & Support
- **WhatsApp**: +62 882-1617-8244
- **Instagram**: @refloreoiterum
- **Facebook**: @refloreoiterum
- **Lokasi**: Dusun I, Petir, Kec. Kalibagor, Kabupaten Banyumas, Jawa Tengah

## Credits
Developed by Kelompok 4 - Capstone Project Sistem Informasi Telkom University Purwokerto 2025
Kelompok 4 :
1. Urip Yoga Pangestu (2211103102)
2. Risnawati Sinaga (2211103100)
3. Andi Syafar Ilham (2211103046)

## License
This project is proprietary software developed for Refloreo Iterum UMKM.
