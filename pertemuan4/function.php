<?php

    function salam($waktu = "Datang", $nama = "Admin"){
        return "Selamat $waktu, $nama!";
    };


?>

<html>
    <title>Latihan Function</title>

    <h1><?= salam("Pagi", "Agus"); ?></h1>
</html>