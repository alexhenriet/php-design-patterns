<?php

require 'classes.php';

$husband = new Husband();
$husband->attach(new Wife());
$husband->pay();