<?php

require 'classes.php';

$var = new Folder('var');
$tmp = new Folder('tmp');
$log = new Folder('log');
$xxx = new File('SRzFSx78', 328);
$yyy = new File('auth.log', 1044);
$zzz = new File('quota.txt', 102);

$tmp->addElement($xxx);
$log->addElement($yyy);
$var->addElement($tmp);
$var->addElement($log);
$var->addElement($zzz);

echo $zzz->getSize() . PHP_EOL; // 102
echo $log->getSize() . PHP_EOL; // 1044
echo $var->getSize() . PHP_EOL; // 1474
echo $var->getPath() . PHP_EOL; // var
echo $yyy->getPath() . PHP_EOL; // var/log/auth.log
