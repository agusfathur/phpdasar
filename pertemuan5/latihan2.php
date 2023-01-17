<?php 
    $angka = [1, 5, 6, 9, 90, 120, 20];
?>

<html>
    <head>
        <title>Latihan 2 P5</title>
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
        <?php for ($i=0; $i <count($angka); $i++) {?>
            <div class="kotak"><?php echo $angka[$i]?></div>
        <?php } ?>

        <div class="clear"></div>
        
        <?php foreach ($angka as $a) {?>
        <div class="kotak"><?php echo $a?></div>
        <?php }?>

        <div class="clear"></div>
        
        <?php foreach ($angka as $a) :?>
        <div class="kotak"><?= $a; ?></div>
        <?php endforeach; ?>
    </body>
</html>