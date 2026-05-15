# E-Commerce Produk - Sesi 8

Aplikasi e-commerce sederhana dengan fitur pencarian dan filter kategori.

## Fitur
- ✅ Pencarian produk berdasarkan nama
- ✅ Filter berdasarkan kategori (Makanan, Pakaian, Elektronik)
- ✅ Tampilan gambar produk
- ✅ Responsive design

## Struktur Database
```sql
CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    kategori VARCHAR(50),
    deskripsi TEXT,
    gambar VARCHAR(255)
);
```

## Cara Menambahkan Gambar Produk

1. Letakkan file gambar di folder `images/`
2. Pastikan nama file sesuai dengan yang ada di database
3. Format gambar yang didukung: JPG, PNG, GIF, SVG
4. Ukuran gambar akan otomatis disesuaikan (300x200px)

### Contoh gambar yang dibutuhkan:
- nasi-goreng.jpg
- kaos-polos.jpg
- laptop-asus.jpg
- mie-ayam.jpg
- jaket-hoodie.jpg
- samsung-phone.jpg
- burger.jpg
- sneakers.jpg

## Cara Penggunaan

1. Pastikan XAMPP MySQL sudah berjalan
2. Import file `ecommerse.sql` ke database `ecommerse_dc`
3. Akses `http://localhost/bootcamp-8/sesi8/index.php`
4. Gunakan kotak pencarian untuk mencari produk
5. Klik kategori untuk memfilter produk

## File Structure
```
sesi8/
├── index.php          # Halaman utama
├── koneksi.php        # Koneksi database
├── ecommerse.sql      # Schema database
└── images/            # Folder gambar produk
    └── placeholder.svg # Placeholder jika gambar tidak ada
```