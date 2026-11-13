<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'administrator') {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['daftar'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $db->query("INSERT INTO user (Username, Password, Role) VALUES ('$user', '$pass', '$role')");
    echo "<script>alert('Akun berhasil dibuat!'); window.location='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .kotak-register {
            width: 350px;
            margin: 80px auto;
            background-color: white;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .tombol-simpan {
            width: 100%;
            background-color: aqua;
            color: black;
            padding: 12px;
            font-weight: bold;
            border: 1px solid #00cccc;
            border-radius: 4px;
            cursor: pointer;
        }
        .tombol-kembali {
            display: block;
            text-align: center;
            background-color: #cccccc;
            color: black;
            text-decoration: none;
            padding: 10px;
            margin-top: 10px;
            font-weight: bold;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="kotak-register">
        <h2 align="center">REGISTER AKUN</h2>
        <hr>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Pilih Jabatan (Role)</label>
            <select name="role">
                <option value="petugas">Petugas</option>
                <option value="administrator">Administrator</option>
            </select>

            <button type="submit" name="daftar" class="tombol-simpan">SIMPAN AKUN</button>
            <a href="dashboard.php" class="tombol-kembali">KEMBALI</a>
        </form>
    </div>

</body>
</html>
