CREATE DATABASE IF NOT EXISTS ecommerse_dc;
USE ecommerse_dc;

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    kategori VARCHAR(50),
    deskripsi TEXT,
    gambar VARCHAR(255)
);

INSERT INTO produk (nama_produk, harga, kategori, deskripsi, gambar) VALUES
('Nasi Goreng', 15000, 'makanan', 'Nasi goreng spesial dengan telur dan ayam', 'nasi goreng.jfif'),
('Kaos Polos', 50000, 'pakaian', 'Kaos nyaman dipakai sehari-hari', 'kaos polos.jfif'),
('Laptop Asus', 7000000, 'elektronik', 'Laptop gaming dengan performa tinggi', 'laptop asus.jfif'),
('Mie Ayam', 12000, 'makanan', 'Mie ayam enak dengan pangsit', 'mie ayam.jfif'),
('Jaket Hoodie', 120000, 'pakaian', 'Hoodie kekinian dengan bahan berkualitas', 'hoddie.jfif');