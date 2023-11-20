<?php 

require __DIR__ . '/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

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
<?php

$logger = new Logger('logger');
$logger->pushHandler(new StreamHandler(__DIR__.'/logs/app.log', Level::Debug));
$logger->pushHandler(new FirePHPHandler());

$user = ['name' => 'User', 'age' => 30, 'sex' => 'man'];

$logger->info('User', $user);
$log = require __DIR__ . '/logs/app.log';

var_dump($log);

?>




</body>
</html>


