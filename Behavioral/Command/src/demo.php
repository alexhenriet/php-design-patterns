<?php

require 'classes.php';

$deployment = new ProjectDeploymentProcedure(['backup everything', 'svn checkout', 'copy database']);

$systemOperator1 = new SystemOperator('Bob');
$systemOperator2 = new SystemOperator('John');

$technicalCoordinator = new TechnicalCoordinator();
$technicalCoordinator->addOperator($systemOperator1);
$technicalCoordinator->addOperator($systemOperator2);

$systemOperator1->treatTodo();
$systemOperator2->treatTodo();

(new ProjectDeveloper())->askDeployment($technicalCoordinator, $deployment);

$systemOperator1->treatTodo();
$systemOperator2->treatTodo();