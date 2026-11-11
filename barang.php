<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $db->query("INSERT INTO produk VALUES (NULL, '$nama', '$harga', '$stok')");
    header("Location: barang.php");
}

if (isset($_POST['ubah'])) {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $db->query("UPDATE produk SET NamaProduk='$nama', Harga='$harga', Stok='$stok' WHERE ProdukID='$id'");
    header("Location: barang.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $db->query("DELETE FROM produk WHERE ProdukID='$id'");
    header("Location: barang.php");
}

$produk = $db->ambilData("SELECT * FROM produk");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php"> KEMBALI KE BERANDA</a>
    </div>

    <div class="container">
        <h3>Tambah Barang Baru</h3>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Produk" required>
            <input type="number" name="harga" placeholder="Harga Barang" required>
            <input type="number" name="stok" placeholder="Stok Awal" required>
            <button type="submit" name="tambah" class="btn-hijau">TAMBAH BARANG</button>
        </form>

        <hr>
        <h3>Daftar & Stok Barang</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; foreach ($produk as $p) { ?>
            <tr>
                <form method="POST">
                    <td><?php echo $no++; ?> <input type="hidden" name="id" value="<?php echo $p['ProdukID']; ?>"></td>
                    <td><input type="text" name="nama" value="<?php echo $p['NamaProduk']; ?>"></td>
                    <td><input type="number" name="harga" value="<?php echo $p['Harga']; ?>"></td>
                    <td><input type="number" name="stok" value="<?php echo $p['Stok']; ?>"></td>
                    <td>
                        <button type="submit" name="ubah" class="btn-kuning">Simpan</button>
                        <a href="barang.php?hapus=<?php echo $p['ProdukID']; ?>" class="btn btn-merah" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </form>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
