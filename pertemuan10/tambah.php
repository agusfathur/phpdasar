<?php
require 'functions.php';
// cek apakah tombol sudah ditekan atau belum
if(isset($_POST['submit'])){

    // cek apakah berhasil ditambahkan atau tidak
    // semua data dambil ke paramaeter tambah $_POST diambli $data
    if(tambah($_POST) > 0){
        echo  "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>   
        ";
    }else{
        echo "
            <script>
                alert('data Gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="prodi">Prodi : </label>
                <input type="text" name="prodi" id="prodi" required>
            </li>
            
            <li>
                <label for="gambar">Gambar: </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>

    </form>
    
</body>
</html>