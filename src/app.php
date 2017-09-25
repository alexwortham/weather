<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$testDB = getenv('TEST_DB');
$doTest = true;
if (!empty($testDB)) {
    $doTest = $testDB;
}

$app = new App(array(), $doTest);

return $app;
