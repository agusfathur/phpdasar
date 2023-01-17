<?php 
//  Varible Scope / lingkup variabel;
// $x = 10;
// function tampilx(){
//     global $x; // Mencari variable yanga da di luar function
//     echo $x;
// }
// tampilx();

//  VARIABLE SUPERGLOBALS, $_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE, $_SERVER, $_ENV
// VARIABLE SUPERGLOBALS semua tipe Array Assosiative
$mahasiswa = [
    ["nama"=> "Agus", 
    "nim" => "202151113",
    "prodi" => "Teknik Informatika", 
    "email" => "202151113@std.umk.ac.id",
    "gambar" => "jkw-1.jpg"
    ],
    ["nama"=> "Yaulian", 
    "nim" => "202151100",
    "prodi" => "Teknik Informatika", 
    "email" => "202151100@std.umk.ac.id",
    "gambar" => "windah-1.jpg"
    ]
];
?>
<html>
    <head>
        <title>GET</title>
    </head>
    <body>
        <h1>Daftar mahasiswa</h1>
    
        <ul>
            <?php foreach($mahasiswa as $mhs):?>
                <li><a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&prodi=<?= $mhs["prodi"]; ?>
                &email=<?= $mhs["email"]; ?>&gambar=<?= $mhs["gambar"]; ?>">
                <?= $mhs["nama"]; ?></a> </li>
            <?php endforeach; ?>
        </ul>
        
    </body>
</html>