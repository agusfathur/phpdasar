<?php 
// Array Numeric
// $mahasiswa=[
//     ["Moh Agus Fathur Rozi", "202151113", "Teknik Informartika","202151113@std.umk.ac.id"],
//     ["Yulian Eka Saputra", "202151100", "Teknik Informartika","202151100@std.umk.ac.id"]
// ];

// Array Associative
// seperti numerik, tapi
// Key nya adalah string
$mahasiswa = [
    ["nama"=> "Agus", 
    "nim" => "202151113",
    "prodi" => "Teknik Informatika", 
    "Email" => "202151113@std.umk.ac.id",
    "gambar" => "jkw-1.jpg"
    ],
    ["nama"=> "Yaulian", 
    "nim" => "202151100",
    "prodi" => "Teknik Informatika", 
    "Email" => "202151100@std.umk.ac.id",
    "gambar" => "windah-1.jpg"
    ]
];
?>

<html>
    <head>
        <title>Latihan 3 P5</title>
    </head>
    <body>
        <h1>DAFTAR MAHASISWA</h1>
        
        <?php foreach($mahasiswa as $mhs):?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"];?>">
            </li>
            <li>Nama    : <?= $mhs["nama"]; ?></li>
            <li>NIM     : <?= $mhs["nim"]; ?></li>
            <li>Prodi   : <?= $mhs["prodi"]; ?></li>
            <li>Email   : <?= $mhs["Email"]; ?></li>
        </ul>
        <?php endforeach; ?>

    </body>
</html>