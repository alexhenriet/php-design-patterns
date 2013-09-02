<?php

require 'classes.php';

$writer = new UnderlineWriter(new BoldWriter(new NewLineWriter(new SimpleWriter())));
$writer->write('Hello world');