<?php

require 'classes_alt.php';

$report = new Report('Sales report', [50, 50, 100, 75, 55], function(Report $context) {
    echo '<html><head><title>' . htmlentities($context->getTitle()) . '</title></head>';
    echo '<body><h1>' . htmlentities($context->getTitle()) . '</h1><ol id="values">';
    foreach($context->getValues() as $value) {
        echo '<li>' . htmlentities($value) . '</li>';
    }
    echo '</ol></body>';
    echo '<footer><p>...</p></footer></html>';
});
$report();