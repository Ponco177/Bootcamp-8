<?php
include 'koneksi.php';

// Check if connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$filter = "";
$search = "";

// Handle search
if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $filter .= " AND nama_produk LIKE '%$search%'";
}

// Handle category filter
if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
    $kategori = mysqli_real_escape_string($conn, $_GET['kategori']);
    $filter .= " AND kategori='$kategori'";
}

$query = "SELECT * FROM produk WHERE 1=1 $filter ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Produk</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
            margin: 0;
        }

        h1{
            text-align:center;
            color: #333;
            margin-bottom: 30px;
        }

        .search-container{
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form{
            display: inline-block;
            margin-bottom: 20px;
        }

        .search-form input[type="text"]{
            padding: 10px;
            width: 300px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
        }

        .search-form input[type="text"]:focus{
            border-color: #3b82f6;
        }

        .search-form button{
            padding: 10px 20px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }

        .search-form button:hover{
            background: #2563eb;
        }

        .filter{
            text-align:center;
            margin-bottom:30px;
        }

        .filter a{
            text-decoration:none;
            padding:8px 16px;
            background:#3b82f6;
            color:white;
            border-radius:20px;
            margin:5px;
            display: inline-block;
            transition: background 0.3s;
        }

        .filter a:hover, .filter a.active{
            background: #2563eb;
        }

        .container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card:hover{
            transform: translateY(-5px);
            box-shadow:0 8px 25px rgba(0,0,0,0.15);
        }

        .product-image{
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .card h2{
            margin: 0 0 10px 0;
            color: #333;
            font-size: 18px;
        }

        .harga{
            color:#2563eb;
            font-weight:bold;
            font-size: 20px;
            margin:10px 0;
        }

        .kategori{
            display:inline-block;
            background:#e3f2fd;
            color: #1976d2;
            padding:5px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .deskripsi{
            color: #666;
            line-height: 1.5;
            margin: 10px 0;
        }

        .no-results{
            text-align: center;
            color: #666;
            font-size: 18px;
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>

<h1>E-Commerce Produk</h1>

<div class="search-container">
    <form class="search-form" method="GET" action="">
        <input type="text" name="search" placeholder="Cari produk..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="hidden" name="kategori" value="<?php echo htmlspecialchars($_GET['kategori'] ?? ''); ?>">
        <button type="submit">Cari</button>
    </form>
</div>

<div class="filter">
    <a href="?<?php echo $search ? 'search='.urlencode($search).'&' : ''; ?>kategori=" class="<?php echo (!isset($_GET['kategori']) || $_GET['kategori'] == '') ? 'active' : ''; ?>">Semua</a>
    <a href="?<?php echo $search ? 'search='.urlencode($search).'&' : ''; ?>kategori=makanan" class="<?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'makanan') ? 'active' : ''; ?>">🍽️ Makanan</a>
    <a href="?<?php echo $search ? 'search='.urlencode($search).'&' : ''; ?>kategori=pakaian" class="<?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'pakaian') ? 'active' : ''; ?>">👕 Pakaian</a>
    <a href="?<?php echo $search ? 'search='.urlencode($search).'&' : ''; ?>kategori=elektronik" class="<?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'elektronik') ? 'active' : ''; ?>">📱 Elektronik</a>
</div>

<div class="container">

<?php 
$productCount = 0;
while($data = mysqli_fetch_assoc($result)) : 
    $productCount++;
?>

    <div class="card">
        <img src="images/<?php echo $data['gambar']; ?>" alt="<?php echo htmlspecialchars($data['nama_produk']); ?>" class="product-image" loading="lazy">
        <h2><?php echo htmlspecialchars($data['nama_produk']); ?></h2>

        <p class="harga">
            Rp <?php echo number_format($data['harga'],0,',','.'); ?>
        </p>

        <span class="kategori">
            <?php echo ucfirst(htmlspecialchars($data['kategori'])); ?>
        </span>

        <p class="deskripsi">
            <?php echo htmlspecialchars($data['deskripsi']); ?>
        </p>
    </div>

<?php endwhile; ?>

<?php if ($productCount == 0): ?>
    <div class="no-results">
        <h3>Tidak ada produk ditemukan</h3>
        <p>Coba ubah kata kunci pencarian atau filter kategori.</p>
    </div>
<?php endif; ?>

</div>

</body>
</html>