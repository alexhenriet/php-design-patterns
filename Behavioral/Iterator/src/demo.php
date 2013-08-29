<?php

require 'classes_5.5.php';

$belgium = new Country('Belgique');
$belgium
    ->addCity(new City('Bruxelles'))
    ->addCity(new City('Mons'))
    ->addCity(new City('Namur'))
    ->addCity(new City('Liège'))
    ->addCity(new City('Charleroi'));

$cityIterator = $belgium->cityIterator();
foreach($cityIterator as $city) {
    echo $city->getName() . PHP_EOL;
}