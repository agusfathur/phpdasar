
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">tgl</label>
            <input type="checkbox" name="tgl" value="35000">
        </div>
        <button type="submit">OK</button>
    </form>
</body>
</html>
<?php

$tgl = (int)$_POST['tgl'];

echo var_dump($tgl);
?>