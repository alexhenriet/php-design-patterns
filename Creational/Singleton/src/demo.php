<?php

require 'classes.php';

$sun1 = Sun::getInstance();
$sun2 = Sun::getInstance();

echo spl_object_hash($sun1) . PHP_EOL;
echo spl_object_hash($sun2) . PHP_EOL;