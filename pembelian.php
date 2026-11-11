<?php
session_start();
include 'koneksi.php';

if (isset($_POST['proses'])) {
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telp   = $_POST['telp'];
    $id_pr  = $_POST['produk_id'];
    $jumlah = $_POST['jumlah'];
    $tgl    = date('Y-m-d');

    $brg = mysqli_fetch_assoc($db->query("SELECT * FROM produk WHERE ProdukID='$id_pr'"));
    $subtotal = $brg['Harga'] * $jumlah;
    $sisa_stok = $brg['Stok'] - $jumlah;

   
    $db->query("INSERT INTO pelanggan VALUES (NULL, '$nama', '$alamat', '$telp')");
    $id_pelanggan = mysqli_insert_id($db->koneksi);

  
    $db->query("INSERT INTO penjualan VALUES (NULL, '$tgl', '$subtotal', '$id_pelanggan')");
    $id_penjualan = mysqli_insert_id($db->koneksi);

  
    $db->query("INSERT INTO detailpenjualan VALUES (NULL, '$id_penjualan', '$id_pr', '$jumlah', '$subtotal')");

 
    $db->query("UPDATE produk SET Stok='$sisa_stok' WHERE ProdukID='$id_pr'");

    echo "<script>alert('Transaksi Berhasil!'); window.location='laporan.php';</script>";
}

$produk = $db->ambilData("SELECT * FROM produk WHERE Stok > 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php"> KEMBALI KE BERANDA</a>
    </div>

    <div class="container" style="width:500px;">
        <h3>Form Transaksi Kasir</h3>
        <form method="POST">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" required>
            <label>Alamat</label>
            <textarea name="alamat" required></textarea>
            <label>Nomor Telepon</label>
            <input type="text" name="telp" required>
            <hr>
            <label>Pilih Barang</label>
            <select name="produk_id" required>
                <?php foreach ($produk as $p) { ?>
                    <option value="<?php echo $p['ProdukID']; ?>">
                        <?php echo $p['NamaProduk']; ?> - Rp <?php echo number_format($p['Harga']); ?> (Stok: <?php echo $p['Stok']; ?>)
                    </option>
                <?php } ?>
            </select>
            <label>Jumlah Beli</label>
            <input type="number" name="jumlah" min="1" required>
            <button type="submit" name="proses" class="btn-hijau" style="width:100%;">BAYAR & SIMPAN</button>
        </form>
    </div>
</body>
</html>
