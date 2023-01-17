<?php

// cek apakah ada data di $_GET
// isset() apakah ada ?
// baca: jika, tidak ada variabel $_GET["nama"] ada, ekseskusi:
if(!isset($_GET["nama"]) || 
    !isset($_GET["nim"]) || 
    !isset($_GET["prodi"]) || 
    !isset($_GET["email"]) ||
    !isset($_GET["gambar"])) {
    header("Location:latihan1.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiwa</title>
</head>
<body>
    <ul>
        <li>
            <img src="img/<?= $_GET["gambar"]; ?>" alt="">
            <li><?= $_GET["nama"]; ?></li> <!-- GET dari key latihan1.php-->
            <li><?= $_GET["nim"]; ?></li>
            <li><?= $_GET["prodi"]; ?></li>
            <li><?= $_GET["email"]; ?></li>
        </li>
        <a href="latihan1.php">Kembali</a>
    </ul>
</body>
</html>