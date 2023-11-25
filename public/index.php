<?php

session_start();

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../vendor/autoload.php';


use core\Application;

$app = new Application();

$app->run();

