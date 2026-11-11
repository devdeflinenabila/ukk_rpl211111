 <?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kasir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="registrasi.php">REGISTER ADMIN</a>
        <a href="barang.php">PENDATAAN & STOK BARANG</a>
        <a href="pembelian.php">PEMBELIAN</a>
        <a href="laporan.php">LAPORAN PENJUALAN</a>
        <a href="logout.php">LOGOUT DARI AKUN<a>
</body>
</html>

 