
<?php // Array Multidimensi
$mhs=[
    ["Moh Agus Fathur Rozi", "202151113", "Teknik Informartika","202151113@std.umk.ac.id"],
    ["Yulian Eka Saputra", "202151100", "Teknik Informartika","202151100@std.umk.ac.id"]
];?>

<html>
    <head>
        <title>Latihan 3 P5</title>
    </head>
    <body>
        <h1>DAFTAR MAHASISWA</h1>
        
        <?php foreach($mhs as $m):?>
        <ul>
            <li>Nama    : <?= $m[0]; ?></li>
            <li>NIM     : <?= $m[1]; ?></li>
            <li>Prodi   : <?= $m[2]; ?></li>
            <li>Email   : <?= $m[3]; ?></li>
        </ul>
        <?php endforeach; ?>

    </body>
</html>