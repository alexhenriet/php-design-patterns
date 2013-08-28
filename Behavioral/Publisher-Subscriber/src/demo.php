<?php

require 'classes.php';

$publisher = new Publisher();
$publisher->subscribe('Husband::pay', new Wife());
$husband = new Husband($publisher);
$husband->pay();