<?php 

require __DIR__ . '/vendor/autoload.php';


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use app\Figure;

$encoders = [new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];
$serializer = new Serializer($normalizers, $encoders);


$figure = new Figure(100, 500);
$figure->setArea();
$figure->setLength();
$figure->setColor();


// сериалізація об'єкта класу Figure
$jsonContent = $serializer->serialize($figure, 'json');

var_dump($jsonContent);

// десериалізація об'єкта класу Figure
$newFigure = $serializer->deserialize($jsonContent, Figure::class, 'json');

var_dump($newFigure);