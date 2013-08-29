<?php

require 'classes.php';

$rolesFromDatabase = ['henriet.a' => ['hr','accounting', 'material'], 'manfroid.e' => ['accounting']];

$companyERP = new CompanyERP();
$securedCompanyERP = new CompanyERPProxy($companyERP, $rolesFromDatabase);

$securedCompanyERP->setCurrentlyLoggedUser('henriet.a');
$securedCompanyERP->getHumanResourceData();

$securedCompanyERP->setCurrentlyLoggedUser('manfroid.e');
$securedCompanyERP->getHumanResourceData();


