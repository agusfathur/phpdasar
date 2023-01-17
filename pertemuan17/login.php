<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
                id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan usernama
    if($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }

}

// cek login
if(isset($_SESSION['login'])){
    header('Location:index.php');
    exit;
}

// cek login
if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result  = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    // mysqli_num_rows() => cek apakah ada baris yang dikembalikan, 1
    if(mysqli_num_rows($result) === 1){

        // cek password
        // simpan data user login
        $row = mysqli_fetch_assoc($result);
        // cek password_hash
        // password_verify(yang ditulis, di database['username'])
        if(password_verify($password, $row['password'])){
            // set session
            $_SESSION['login'] = true;

            // cek remember me
            if(isset($_POST['remember'])){
                // buat cookie

                setcookie('id', $row['id'], time()+60);
                // hash(algoritma enkripsi, untuk tulisan / data)
                setcookie('key',hash('sha256', $row['username']),time()+60);
            }

            header('Location:index.php');
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    
    <h1>Halaman Login</h1>

    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me!</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

</body>
</html>