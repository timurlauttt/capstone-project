# Use Case Diagram - Refloreo Iterum

## Diagram
```plantuml
@startuml
left to right direction
skinparam packageStyle rectangle

actor "Customer/Visitor" as Customer
actor "Farmer/Admin" as Farmer

rectangle "Refloreo Iterum System" {
  
  package "Public Features" {
    usecase "UC1: Lihat Landing Page" as UC1
    usecase "UC2: Browse Katalog Produk" as UC2
    usecase "UC3: Lihat Detail Kategori" as UC3
    usecase "UC4: Filter Produk by Kategori" as UC4
    usecase "UC5: Lihat Informasi Tentang" as UC5
    usecase "UC6: Lihat FAQ" as UC6
    usecase "UC7: Hubungi via WhatsApp" as UC7
    usecase "UC8: Lihat Lokasi di Maps" as UC8
    usecase "UC9: Scroll to Top" as UC9
  }
  
  package "Admin Features" {
    usecase "UC10: Login ke Dashboard" as UC10
    usecase "UC11: Lihat Dashboard" as UC11
    usecase "UC12: Kelola Produk" as UC12
    usecase "UC13: Tambah Produk" as UC13
    usecase "UC14: Edit Produk" as UC14
    usecase "UC15: Hapus Produk" as UC15
    usecase "UC16: Toggle Visibilitas Produk" as UC16
    usecase "UC17: Upload Gambar Produk" as UC17
    usecase "UC18: Hapus Gambar Produk" as UC18
    usecase "UC19: Kelola Inquiry" as UC19
    usecase "UC20: Logout" as UC20
  }
}

' Customer relationships
Customer --> UC1
Customer --> UC2
Customer --> UC3
Customer --> UC4
Customer --> UC5
Customer --> UC6
Customer --> UC7
Customer --> UC8
Customer --> UC9

' Farmer relationships
Farmer --> UC10
Farmer --> UC11
Farmer --> UC12
Farmer --> UC13
Farmer --> UC14
Farmer --> UC15
Farmer --> UC16
Farmer --> UC17
Farmer --> UC18
Farmer --> UC19
Farmer --> UC20

' Include relationships
UC2 ..> UC4 : <<include>>
UC3 ..> UC7 : <<include>>
UC13 ..> UC17 : <<include>>
UC14 ..> UC17 : <<include>>
UC14 ..> UC18 : <<include>>
UC12 ..> UC13 : <<extend>>
UC12 ..> UC14 : <<extend>>
UC12 ..> UC15 : <<extend>>
UC12 ..> UC16 : <<extend>>

@enduml
```

## Deskripsi Use Cases

### Public Features (Customer/Visitor)

**UC1: Lihat Landing Page**
- Actor: Customer/Visitor
- Deskripsi: Melihat halaman utama dengan hero section, katalog produk preview, section tentang, FAQ
- Precondition: Mengakses website
- Postcondition: Halaman landing ditampilkan

**UC2: Browse Katalog Produk**
- Actor: Customer/Visitor
- Deskripsi: Melihat katalog produk yang dikelompokkan berdasarkan kategori (Kayu, Buah)
- Precondition: Berada di halaman landing
- Postcondition: Produk ditampilkan dengan informasi nama, harga, stok, deskripsi

**UC3: Lihat Detail Kategori**
- Actor: Customer/Visitor
- Deskripsi: Mengklik "Lihat semua" untuk melihat semua produk dalam kategori tertentu dengan pagination
- Precondition: Katalog produk tersedia
- Postcondition: Halaman kategori dengan pagination 10 produk per halaman ditampilkan

**UC4: Filter Produk by Kategori**
- Actor: Customer/Visitor
- Deskripsi: Produk otomatis difilter berdasarkan kategori yang dipilih
- Precondition: Mengakses halaman kategori
- Postcondition: Hanya produk dari kategori terpilih yang ditampilkan

**UC5: Lihat Informasi Tentang**
- Actor: Customer/Visitor
- Deskripsi: Melihat informasi perusahaan, layanan, dan keunggulan
- Precondition: Scroll ke section tentang
- Postcondition: Informasi perusahaan ditampilkan

**UC6: Lihat FAQ**
- Actor: Customer/Visitor
- Deskripsi: Membaca pertanyaan yang sering diajukan dengan accordion interaktif
- Precondition: Scroll ke section FAQ
- Postcondition: FAQ ditampilkan dan dapat di-toggle

**UC7: Hubungi via WhatsApp**
- Actor: Customer/Visitor
- Deskripsi: Menghubungi admin melalui WhatsApp untuk inquiry produk
- Precondition: Klik button WhatsApp di produk atau section tentang
- Postcondition: WhatsApp terbuka dengan template pesan

**UC8: Lihat Lokasi di Maps**
- Actor: Customer/Visitor
- Deskripsi: Melihat lokasi toko di Google Maps (satelit view)
- Precondition: Scroll ke footer
- Postcondition: Embedded map ditampilkan

**UC9: Scroll to Top**
- Actor: Customer/Visitor
- Deskripsi: Menggunakan floating button untuk kembali ke atas halaman
- Precondition: Scroll lebih dari 300px
- Postcondition: Halaman scroll smooth ke atas

### Admin Features (Farmer/Admin)

**UC10: Login ke Dashboard**
- Actor: Farmer/Admin
- Deskripsi: Login menggunakan email dan password
- Precondition: Memiliki akun farmer
- Postcondition: Redirect ke dashboard farmer

**UC11: Lihat Dashboard**
- Actor: Farmer/Admin
- Deskripsi: Melihat overview produk dan inquiry
- Precondition: Sudah login
- Postcondition: Dashboard ditampilkan

**UC12: Kelola Produk**
- Actor: Farmer/Admin
- Deskripsi: Mengakses halaman manajemen produk dengan list semua produk
- Precondition: Sudah login
- Postcondition: List produk dengan pagination ditampilkan

**UC13: Tambah Produk**
- Actor: Farmer/Admin
- Deskripsi: Menambah produk baru dengan informasi lengkap dan gambar
- Precondition: Berada di halaman tambah produk
- Postcondition: Produk baru tersimpan di database

**UC14: Edit Produk**
- Actor: Farmer/Admin
- Deskripsi: Mengubah informasi produk yang sudah ada
- Precondition: Produk sudah ada, memiliki permission (ProductPolicy)
- Postcondition: Informasi produk terupdate

**UC15: Hapus Produk**
- Actor: Farmer/Admin
- Deskripsi: Menghapus produk beserta gambar-gambarnya
- Precondition: Produk sudah ada, memiliki permission (ProductPolicy)
- Postcondition: Produk dan gambar terhapus dari database dan storage

**UC16: Toggle Visibilitas Produk**
- Actor: Farmer/Admin
- Deskripsi: Menyembunyikan atau menampilkan produk di katalog publik
- Precondition: Produk sudah ada, memiliki permission (ProductPolicy)
- Postcondition: is_visible status berubah

**UC17: Upload Gambar Produk**
- Actor: Farmer/Admin
- Deskripsi: Upload satu atau lebih gambar untuk produk (resize otomatis 1200x800)
- Precondition: Form tambah/edit produk
- Postcondition: Gambar tersimpan di public/product-images

**UC18: Hapus Gambar Produk**
- Actor: Farmer/Admin
- Deskripsi: Menghapus gambar tertentu dari produk saat edit
- Precondition: Edit produk dengan gambar existing
- Postcondition: Gambar terhapus dari storage dan database

**UC19: Kelola Inquiry**
- Actor: Farmer/Admin
- Deskripsi: Melihat dan mengelola inquiry dari customer
- Precondition: Sudah login
- Postcondition: List inquiry ditampilkan

**UC20: Logout**
- Actor: Farmer/Admin
- Deskripsi: Keluar dari dashboard
- Precondition: Sudah login
- Postcondition: Session dihapus, redirect ke halaman login
