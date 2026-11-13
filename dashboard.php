<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .kotak-menu {
            width: 350px;
            margin: 80px auto;
            background-color: white;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .tombol-menu {
            display: block;
            background-color: aqua;
            color: black;
            text-decoration: none;
            padding: 12px;
            margin: 10px 0;
            font-weight: bold;
            border: 1px solid #00cccc;
            border-radius: 4px;
        }
        .tombol-menu:hover {
            background-color: #00e6e6;
        }
        .tombol-logout {
            display: block;
            background-color: #ff4d4d;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-top: 20px;
            font-weight: bold;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="kotak-menu">
        <h2>MENU UTAMA</h2>
        <p>Halo, <b><?php echo $_SESSION['username']; ?></b> (<?php echo $_SESSION['role']; ?>)</p>
        <hr>

        <?php if ($_SESSION['role'] == 'administrator') { ?>
            <a href="registrasi.php" class="tombol-menu">REGISTER ADMIN / PETUGAS</a>
        <?php } ?>

        <a href="barang.php" class="tombol-menu">PENDATAAN & STOK BARANG</a>
        <a href="pembelian.php" class="tombol-menu">PEMBELIAN</a>
        <a href="laporan.php" class="tombol-menu">LAPORAN PENJUALAN</a>
        
        <a href="logout.php" class="tombol-logout">LOGOUT DARI AKUN</a>
    </div>

</body>
</html>
