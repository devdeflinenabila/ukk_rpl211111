<?php
session_start();
include 'koneksi.php';

$laporan = $db->ambilData("SELECT penjualan.TanggalPenjualan, pelanggan.NamaPelanggan, produk.NamaProduk, detailpenjualan.JumlahProduk, detailpenjualan.Subtotal 
                           FROM penjualan 
                           JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID 
                           JOIN detailpenjualan ON penjualan.PenjualanID = detailpenjualan.PenjualanID 
                           JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID");
?>
<!DOCTYPE html>
<html> 
<head>
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">KEMBALI KE BERANDA</a>
    </div>

    <div class="container">
        <h3>Laporan Data Penjualan Barang</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
            <?php 
            $no = 1; 
            $total_semua = 0;
            foreach ($laporan as $l) { 
                $total_semua += $l['Subtotal'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $l['TanggalPenjualan']; ?></td>
                <td><?php echo $l['NamaPelanggan']; ?></td>
                <td><?php echo $l['NamaProduk']; ?></td>
                <td><?php echo $l['JumlahProduk']; ?></td>
                <td>Rp <?php echo number_format($l['Subtotal']); ?></td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="5" style="text-align:right;">TOTAL PENDAPATAN</th>
                <th>Rp <?php echo number_format($total_semua); ?></th>
            </tr>
        </table>
    </div>
</body>
</html>
