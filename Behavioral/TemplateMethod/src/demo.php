<?php

require 'classes.php';

$report = new HtmlReport('Sales report', [50, 50, 100, 75, 55]);
$report->generate();

// $report = new TxtReport('Sales report', [50, 50, 100, 75, 55]);
// $report->generate();
