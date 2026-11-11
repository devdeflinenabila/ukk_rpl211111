<?php
session_start();
include 'koneksi.php';
if ($_SESSION['role'] != 'administrator') {
    header("Location: dashboard.php");
}

if (isset($_POST['simpan'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $db->query("INSERT INTO user VALUES (NULL, '$user', '$pass', '$role')");
    echo "<script>alert('User berhasil ditambahkan!');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Petugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php"> KEMBALI KE BERANDA</a>
    </div>
    <div class="container" style="width:400px;">
        <h3>Registrasi Akun Baru</h3>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <label>Hak Akses</label>
            <select name="role">
                <option value="petugas">Petugas</option>
                <option value="administrator">Administrator</option>
            </select>
            <button type="submit" name="simpan" class="btn-hijau">SIMPAN AKUN</button>
        </form>
    </div>
</body>
</html>
