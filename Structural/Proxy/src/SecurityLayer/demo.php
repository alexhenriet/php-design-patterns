<?php

require 'classes.php';

$rolesFromDatabase = ['henriet.a' => ['hr','accounting', 'material'], 'manfroid.e' => ['accounting']];

$companyERP = new CompanyERP();
$securedCompanyERP = new CompanyERPSecurityProxy($companyERP, $rolesFromDatabase);

try {
    $securedCompanyERP->setCurrentlyLoggedUser('henriet.a');
    $securedCompanyERP->getHumanResourceData();
} catch(\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $securedCompanyERP->setCurrentlyLoggedUser('manfroid.e');
    $securedCompanyERP->getHumanResourceData();
} catch(\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

