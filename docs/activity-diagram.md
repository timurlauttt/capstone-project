# Activity Diagram - Refloreo Iterum

## 1. Activity Diagram: Browse dan Order Produk (Customer Flow)

```plantuml
@startuml
start
:Customer mengakses website;
:Tampilkan Landing Page;
:Lihat Hero Section;

if (Ingin lihat produk?) then (yes)
  :Scroll ke Product Section;
  :Tampilkan katalog produk by kategori;
  
  if (Ingin lihat semua produk kategori?) then (yes)
    :Klik "Lihat Semua";
    :Redirect ke /menu/{slug};
    :Tampilkan produk dengan pagination;
    
    if (Ada produk yang menarik?) then (yes)
      :Lihat detail produk (nama, deskripsi, harga, stok);
      if (Ingin pesan?) then (yes)
        :Klik button WhatsApp di card produk;
        :Buka WhatsApp dengan template message;
        :Chat dengan Pak Harmoko;
        stop
      else (no)
      endif
    else (no)
      if (Halaman berikutnya?) then (yes)
        :Klik pagination;
        :Load produk halaman berikutnya;
      else (no)
      endif
    endif
  else (no)
  endif
  
else (no)
endif

if (Ingin tahu tentang perusahaan?) then (yes)
  :Scroll ke Section Tentang;
  :Baca informasi perusahaan;
  
  if (Ingin konsultasi?) then (yes)
    :Klik button "Hubungi Kami";
    :Buka WhatsApp;
    :Chat dengan admin;
    stop
  else (no)
  endif
else (no)
endif

if (Ada pertanyaan?) then (yes)
  :Scroll ke FAQ Section;
  :Klik accordion FAQ;
  :Baca jawaban;
else (no)
endif

if (Perlu scroll ke atas?) then (yes)
  :Klik floating "Back to Top" button;
  :Smooth scroll ke atas;
else (no)
endif

stop
@enduml
```

## 2. Activity Diagram: Tambah Produk (Farmer Flow)

```plantuml
@startuml
start
:Farmer membuka /farmer/login;
:Input email dan password;

if (Kredensial valid?) then (yes)
  :Login berhasil;
  :Redirect ke /farmer/dashboard;
else (no)
  :Tampilkan error message;
  stop
endif

:Lihat Dashboard;
:Klik menu "Products";
:Tampilkan list produk dengan pagination;
:Klik button "Tambah Produk";
:Buka form tambah produk;

partition "Isi Form Produk" {
  :Input Judul Produk;
  :Pilih Kategori (dropdown);
  :Input Deskripsi;
  :Input Harga (numeric);
  :Input Unit (default: batang);
  :Input Stok (numeric);
  :Pilih Status (available/unavailable/preorder);
  :Upload Gambar Produk (multiple);
  note right
    - Max 5MB per file
    - Auto resize ke 1200x800
    - Disimpan di public/product-images
  end note
}

:Klik button "Simpan";

if (Validasi berhasil?) then (yes)
  :Generate slug dari title + random(6);
  :Simpan data produk ke database;
  :user_id = Auth::user()->id;
  
  fork
    :Process dan simpan gambar;
    :Resize gambar ke 1200x800;
    :Generate filename random(12);
    :Simpan ke public/product-images;
    :Simpan path ke product_images table;
  fork again
    :Set default unit = "batang" jika kosong;
    :Set is_visible = false (default);
  end fork
  
  :Flash success message;
  :Redirect ke /farmer/products;
  :Tampilkan list produk terupdate;
  stop
else (no)
  :Tampilkan validation error;
  :Tetap di form dengan old input;
  stop
endif
@enduml
```

## 3. Activity Diagram: Edit dan Toggle Visibility Produk (Farmer Flow)

```plantuml
@startuml
start
:Farmer di halaman Products List;
:Tampilkan semua produk milik farmer;

if (Aksi yang dipilih?) then (Edit Produk)
  :Klik button "Edit" pada produk;
  
  if (Policy check: user owns product?) then (yes)
    :Load data produk;
    :Load kategori;
    :Load gambar existing;
    :Tampilkan form edit;
    
    partition "Edit Data" {
      :Ubah field yang diinginkan;
      :Upload gambar baru (optional);
      :Centang gambar untuk dihapus (optional);
    }
    
    :Klik button "Update";
    
    if (Validasi berhasil?) then (yes)
      :Update data produk di database;
      
      fork
        if (Ada gambar yang dicentang untuk dihapus?) then (yes)
          :Loop through remove_images[];
          :Hapus file dari public/product-images;
          :Delete record dari product_images table;
        endif
      fork again
        if (Ada gambar baru di-upload?) then (yes)
          :Process dan simpan gambar baru;
          :Resize ke 1200x800;
          :Simpan ke public/product-images;
          :Insert ke product_images table;
        endif
      end fork
      
      :Flash success message;
      :Redirect ke products list;
      stop
    else (no)
      :Tampilkan validation error;
      stop
    endif
  else (no - 403 Forbidden)
    :Tampilkan error 403;
    note right
      ProductPolicy check:
      user->id === product->user_id 
      OR user->role === 'farmer'
    end note
    stop
  endif
  
elseif (Toggle Visibility) then
  :Klik switch visibility pada produk;
  
  if (Policy check: user owns product?) then (yes)
    :Toggle is_visible boolean;
    :$product->is_visible = !$product->is_visible;
    :Save ke database;
    
    if (is_visible = true?) then (yes)
      :Flash "Produk berhasil ditampilkan";
    else (no)
      :Flash "Produk berhasil disembunyikan";
    endif
    
    :Reload products list;
    stop
  else (no - 403 Forbidden)
    :Tampilkan error 403;
    stop
  endif
  
elseif (Hapus Produk) then
  :Klik button "Hapus" pada produk;
  :Tampilkan konfirmasi dialog;
  
  if (Konfirmasi hapus?) then (yes)
    if (Policy check: user owns product?) then (yes)
      fork
        :Loop through product->images;
        :Hapus file dari public/product-images;
        :Delete dari product_images table;
      fork again
        :Delete produk dari products table;
      end fork
      
      :Flash success message;
      :Reload products list;
      stop
    else (no - 403 Forbidden)
      :Tampilkan error 403;
      stop
    endif
  else (no)
    :Batal hapus;
    stop
  endif
endif

stop
@enduml
```

## 4. Activity Diagram: Sistem Pagination Kategori

```plantuml
@startuml
start
:Customer klik "Lihat Semua" di kategori;
:System terima request GET /menu/{slug};
:Query Category by slug;

if (Kategori ditemukan?) then (yes)
  :Query products where category_id = {id};
  :Filter is_visible = 1;
  :Apply pagination (10 per page);
  :Hitung total produk;
  :Hitung current page;
  :Hitung firstItem & lastItem;
  
  :Render view menu.category;
  
  partition "Tampilan Halaman" {
    :Tampilkan judul kategori;
    :Tampilkan info "Menampilkan X-Y dari N produk";
    
    fork
      :Render grid produk (3 kolom);
      :Untuk setiap produk:;
      :- Tampilkan gambar (first image);
      :- Tampilkan nama dengan prefix "Bibit";
      :- Tampilkan deskripsi;
      :- Tampilkan harga (format Rupiah);
      :- Tampilkan stok;
      :- Tampilkan button WhatsApp;
    fork again
      :Render pagination footer;
      :Tampilkan "Halaman X dari Y";
      :Tampilkan pagination links;
      :onEachSide(1) - tampilkan 1 page di kiri/kanan;
    end fork
  }
  
  if (User klik pagination?) then (yes)
    :Request page berikutnya dengan ?page=N;
    :Query ulang dengan offset berbeda;
    :Update firstItem & lastItem;
    :Re-render halaman;
  else (no)
    stop
  endif
  
else (no - 404)
  :Tampilkan error 404;
  stop
endif
@enduml
```

## Penjelasan Activity Diagram

### 1. Browse dan Order Produk (Customer Flow)
Menggambarkan alur customer dari membuka website, browse produk, filter kategori, hingga melakukan inquiry melalui WhatsApp. Termasuk interaksi dengan FAQ dan back-to-top button.

### 2. Tambah Produk (Farmer Flow)
Menunjukkan proses lengkap farmer menambahkan produk baru, mulai dari login, mengisi form, upload gambar (dengan auto-resize), hingga validasi dan penyimpanan ke database.

### 3. Edit dan Toggle Visibility Produk (Farmer Flow)
Menjelaskan tiga aksi utama farmer: edit produk (termasuk hapus/tambah gambar), toggle visibility untuk hide/show produk, dan hapus produk permanent. Termasuk ProductPolicy authorization check.

### 4. Sistem Pagination Kategori
Menggambarkan mekanisme pagination saat customer membuka halaman kategori penuh, termasuk perhitungan item range, rendering grid produk, dan navigasi antar halaman.

## Key Business Rules dari Activity Diagram

1. **Authorization**: Semua aksi farmer dicek dengan ProductPolicy (owner atau role farmer)
2. **Image Processing**: Auto resize ke 1200x800 saat upload
3. **Visibility**: Produk baru default is_visible = false
4. **Pagination**: 10 produk per halaman dengan onEachSide(1)
5. **WhatsApp Integration**: Template message otomatis dengan nama produk
6. **Slug Generation**: Slug dari title + random 6 karakter untuk uniqueness
