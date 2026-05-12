<?php
if (isset($_POST['submit'])) {
    // 1. Deklarasi Variabel (Mengambil data dari form)
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_produk'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // 2. Validasi Sederhana (Menggunakan if-else)
    // Memastikan data tidak kosong
    if (empty($nama) || empty($harga) || empty($kategori) || empty($deskripsi)) {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
    } else {
        // 3. Penggunaan Operator (Contoh: Tambah pajak 10%)
        $pajak = 0.1;
        $totalHarga = $harga + ($harga * $pajak);

        // Simulasi Berhasil
        echo "<h2>Data Berhasil Diproses</h2>";
        echo "Nama Produk: " . $nama . "<br>";
        echo "Harga Asli: Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Harga + Pajak (10%): Rp " . number_format($totalHarga, 0, ',', '.') . "<br>";
        echo "Kategori: " . ucfirst($kategori) . "<br>";
        echo "Deskripsi: " . $deskripsi . "<br>";
        
        echo "<br><p><i>Data siap disimpan ke database (Langkah selanjutnya).</i></p>";
        echo "<a href='index.php'>Kembali</a>";
    }
} else {
    // Jika mencoba akses langsung tanpa submit form
    header("Location: index.php");
}
?>