<?php 


require __DIR__ . '/vendor/autoload.php';

use app\Date;



if(isset($_POST) && !empty($_POST)){
    header("Location: http://localhost:8000");
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


        <div class="container">


            <?php $date = new Date(12,12, 2023); ?>
            <?php echo $date->isSameDate(new Date(12,12,2023)); echo '<br>'?>
            <?php echo $date->difference(new Date(10, 12, 2022)); ?>


        </div>

</body>
</html>


