<?php

require 'classes.php';

$proxy = new VirtualProxy('SpaceRocket');
$proxy->launch();
$proxy->selfDestroy();
