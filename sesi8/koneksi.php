<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerse_dc";

$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
    mysqli_select_db($conn, $db);
    $sql = "CREATE TABLE IF NOT EXISTS produk (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama_produk VARCHAR(100),
        harga INT,
        kategori VARCHAR(50),
        deskripsi TEXT,
        gambar VARCHAR(255)
    )";
    mysqli_query($conn, $sql);
    
    // Insert sample data if table is empty
    $check = mysqli_query($conn, "SELECT COUNT(*) as count FROM produk");
    $row = mysqli_fetch_assoc($check);
    if ($row['count'] == 0) {
        $insert = "INSERT INTO produk (nama_produk, harga, kategori, deskripsi, gambar) VALUES
            ('Nasi Goreng', 15000, 'makanan', 'Nasi goreng spesial dengan telur dan ayam', 'nasi goreng.jfif'),
            ('Kaos Polos', 50000, 'pakaian', 'Kaos nyaman dipakai sehari-hari', 'kaos polos.jfif'),
            ('Laptop Asus', 7000000, 'elektronik', 'Laptop gaming dengan performa tinggi', 'laptop asus.jfif'),
            ('Mie Ayam', 12000, 'makanan', 'Mie ayam enak dengan pangsit', 'mie ayam.jfif'),
            ('Jaket Hoodie', 120000, 'pakaian', 'Hoodie kekinian dengan bahan berkualitas', 'hoddie.jfif')";
        mysqli_query($conn, $insert);
    }
}
?>