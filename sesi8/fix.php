<?php
include 'koneksi.php';

echo "<h2>✓ Perbaikan Database</h2>";

// Drop old table and recreate
$sql = "DROP TABLE IF EXISTS produk";
if (mysqli_query($conn, $sql)) {
    echo "✓ Tabel lama dihapus<br>";
}

// Create table with gambar column
$sql = "CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    kategori VARCHAR(50),
    deskripsi TEXT,
    gambar VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {
    echo "✓ Tabel produk dibuat ulang<br>";
} else {
    echo "✗ Error: " . mysqli_error($conn) . "<br>";
}

// Insert data with correct image names
$insert = "INSERT INTO produk (nama_produk, harga, kategori, deskripsi, gambar) VALUES
    ('Nasi Goreng', 15000, 'makanan', 'Nasi goreng spesial dengan telur dan ayam', 'nasi goreng.jfif'),
    ('Kaos Polos', 50000, 'pakaian', 'Kaos nyaman dipakai sehari-hari', 'kaos polos.jfif'),
    ('Laptop Asus', 7000000, 'elektronik', 'Laptop gaming dengan performa tinggi', 'laptop asus.jfif'),
    ('Mie Ayam', 12000, 'makanan', 'Mie ayam enak dengan pangsit', 'mie ayam.jfif'),
    ('Jaket Hoodie', 120000, 'pakaian', 'Hoodie kekinian dengan bahan berkualitas', 'hoddie.jfif')";

if (mysqli_query($conn, $insert)) {
    echo "✓ Data produk dimasukkan (5 produk)<br>";
} else {
    echo "✗ Error: " . mysqli_error($conn) . "<br>";
}

echo "<hr>";
echo "<h2>✓ Verifikasi File Gambar</h2>";

$files = scandir(__DIR__ . "/images");
echo "<p>File yang ada di folder images:</p>";
echo "<ul>";
foreach($files as $file) {
    if($file != "." && $file != "..") {
        echo "<li>✓ " . htmlspecialchars($file) . "</li>";
    }
}
echo "</ul>";

echo "<hr>";
echo "<h2>✓ Data Produk di Database</h2>";

$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id");
echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background: #3b82f6; color: white;'><th>ID</th><th>Nama</th><th>Kategori</th><th>Gambar</th><th>File Exists</th></tr>";

while($data = mysqli_fetch_assoc($result)) {
    $file_path = __DIR__ . "/images/" . $data['gambar'];
    $exists = file_exists($file_path) ? "✓ YES" : "✗ NO";
    
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . htmlspecialchars($data['nama_produk']) . "</td>";
    echo "<td>" . htmlspecialchars($data['kategori']) . "</td>";
    echo "<td>" . htmlspecialchars($data['gambar']) . "</td>";
    echo "<td style='text-align: center;'>" . $exists . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<hr>";
echo "<p><a href='index.php' style='padding: 10px 20px; background: #3b82f6; color: white; text-decoration: none; border-radius: 5px;'>← Kembali ke Halaman Utama</a></p>";
?>