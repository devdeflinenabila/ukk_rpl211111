<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cek  = $db->query("SELECT * FROM user WHERE Username='$user' AND Password='$pass'");
    
    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_assoc($cek);
        $_SESSION['username'] = $data['Username'];
        $_SESSION['role']     = $data['Role'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Username atau Password Kamu Salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Kasir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak-login">
        <h2 align="center">LOGIN WEB UKK Kasir</h2>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit" name="login" style="width:100%">MASUK</button>
        </form>
    </div>
</body>
</html>
