<?php 
require 'functions.php';
$mahasiswa = query('SELECT * FROM mahasiswa');
// koneksi ke database
// host, user, pass, nama db

//  Ambil data dari tabel mahasiswa, / QUERY DATA
// db, tabel, 
// if (!$result) {
//     echo mysqli_error($conn);
// };

// ambil dara data mhs dari object result / fecth
// mysqli_fetch_row() // mengembalikan array numerik / rekomen
// mysqli_fetch_assoc() // mengembalikan array asosiatif / rekomen
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() // var_dump($mhs -> nama);

// while($mhs = mysqli_fetch_array($result)){
//     var_dump($mhs);
// }

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
    <h1>Daftar Mahasiswa</h1>

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
                <a href="">Ubah</a> | 
                <a href="">Hapus</a>
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