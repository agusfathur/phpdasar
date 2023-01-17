<?php

require 'vendor/autoload.php';


require 'functions.php'; // memanggil file functions
$mahasiswa = query('SELECT * FROM mahasiswa');

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
        </tr>';
        $i = 1;
        foreach($mahasiswa as $row){
            $html.= '<tr>
                <td>'.$i++.'</td>
                <td><img src="img/'.$row["gambar"].'" width="50"></td>
                <td>'.$row["nim"].'</td>
                <td>'.$row["nama"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["prodi"].'</td>
            </tr>';
        }

$html.= '</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output("Daftar-Mahasiswa.pdf", "I");
// oUTPUT("Nama file.pdf, "I" preview "D" download)

?>
