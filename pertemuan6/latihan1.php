<?php 
$angka=[[1,2,3],[4,5,6],[7,8,9]];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAT 1 P6</title>
    <style>
        .kotak{
                width: 50px;
                height: 50px;
                background-color: aqua;
                line-height: 50px;
                margin: 3px;
                text-align: center;
                border: solid black;
                float: left;
            }
            .clear{
                clear: both;
            }
    </style>
</head>
<body>
    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?= $b ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>