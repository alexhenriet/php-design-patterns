<?php

require 'classes.php';

// $report = new Report('Sales report', [50, 50, 100, 75, 55], new HtmlReportFormatter());
// $report->generate();

$report = new Report('Sales report', [50, 50, 100, 75, 55], new TextReportFormatter());
$report->generate();