<?php
include 'koneksi.php';

echo "<h2>Debug Gambar Produk</h2>";

$query = "SELECT id, nama_produk, gambar FROM produk";
$result = mysqli_query($conn, $query);

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Nama Produk</th><th>Nama File Gambar</th><th>Path</th><th>File Exists</th></tr>";

while($data = mysqli_fetch_assoc($result)) {
    $image_path = "images/" . $data['gambar'];
    $full_path = __DIR__ . "/images/" . $data['gambar'];
    $file_exists = file_exists($full_path) ? "✓ YA" : "✗ TIDAK";
    
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . htmlspecialchars($data['nama_produk']) . "</td>";
    echo "<td>" . htmlspecialchars($data['gambar']) . "</td>";
    echo "<td>" . $image_path . "</td>";
    echo "<td>" . $file_exists . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h3>File yang ada di folder images:</h3>";
$files = scandir(__DIR__ . "/images");
echo "<ul>";
foreach($files as $file) {
    if($file != "." && $file != "..") {
        echo "<li>" . htmlspecialchars($file) . "</li>";
    }
}
echo "</ul>";
?>