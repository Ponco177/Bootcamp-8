<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Baru</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; padding: 50px; }
        .card { background: white; width: 500px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background: #3b82f6; color: white; padding: 15px; font-weight: bold; }
        .container { padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        input, textarea, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; background: #3b82f6; color: white; border: none; padding: 12px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background: #2563eb; }
    </style>
</head>
<body>

<div class="card">
    <div class="header">Tambah Produk Baru</div>
    <div class="container">
        <form action="proses.php" method="POST">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" placeholder="Masukkan nama produk">
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="number" name="harga_produk" placeholder="Masukkan harga">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="">Pilih kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="pakaian">Pakaian</option>
                    <option value="elektronik">Elektronik</option>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="4" placeholder="Deskripsi produk..."></textarea>
            </div>
            <button type="submit" name="submit">Simpan Produk</button>
        </form>
    </div>
</div>

</body>
</html>