<?php

require __DIR__ . '/Calculator.php';

$x = 2;
$y = 8;

$calc = new Calculator($x, $y);

echo 'Результат операции сложения чисел: ' . $calc->addition() . PHP_EOL;
echo 'Результат операции вычитания чисел: ' . $calc->subtractition() . PHP_EOL;
echo 'Результат операции умножения чисел: ' . $calc->mult() . PHP_EOL;
echo 'Результат операции деления чисел: ' . $calc->dividing() . PHP_EOL;