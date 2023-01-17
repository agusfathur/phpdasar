<?php 
session_start();

if(!isset($_SESSION['login'])){
    header('Location:login.php');
    exit;
}
require 'functions.php'; // memanggil file functions

// pagination => LIMIT mulai dari indeks,tampilkan berapa
// konigurasi
// round => pembulatan terdekat, floor => pembulatan kebawah
// ceil => pembulatan keatas
$jumlahDataPerHalaman =2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
//  Ternary ( jika true  ? diisi dengan get[halaman] : false 1)
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari ditekan
if(isset($_POST['cari'])){
    $mahasiswa = cari($_POST['keyword']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" id="" size="40" autofocus
        placeholder="Masukkan Keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>
    <!-- Pagination -->
    <!-- Navigasi -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif -1; ?>">&laquo;</a>
    <?php endif; ?>


    <?php for($i = 1; $i <= $jumlahHalaman; $i++) :  ?>
        <?php if( $i == $halamanAktif):?>
            <a href="?halaman=<?= $i; ?> " style="color=red; font-weight: bold"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    <!-- Next ke kanan -->
    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif +1; ?>">&raquo;</a>
    <?php endif; ?>

    <br>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
        </tr>
        <?php $i = 1?>
        <?php foreach($mahasiswa as $row):?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id']; ?>">Ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin Deck?');">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"] ?>" alt="" width="70"></td>
            <td><?= $row["nim"]?></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
            <td><?= $row["prodi"]?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    

    </table>


</body>
</html>