<?php

$configs = array();

if (!($dbPath = getenv('DB_PATH'))) {
    $dbPath = 'sqlite.db';
}

/* Doctrine Config */
$configs[] = array(
    'db.options' => array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../' . $dbPath,
    ),
);

/* ORM Config */
$configs[] = array(
    'orm.proxies_dir' => 'proxies',
    'orm.em.options' => array(
        'mappings' => array(
            // Using actual filesystem paths
            array(
                'type' => 'annotation',
                'namespace' => 'Models',
                'path' => __DIR__.'/../src/Models',
            ),
        ),
    ),
);

/* App Options */
$configs[] = array(
    'owm.zips' => array (
        /* Zip => Update interval in minutes */
        '37803' => 1,
        '37919' => 2
    ),
    'owm.apikey' => '91de127a7ca0d3adf137e9c0124901f1',
    'owm.urls' => array(
        'weather' => 'http://api.openweathermap.org/data/2.5/weather'
    ),
);

$config = call_user_func_array('array_merge', $configs);

return $config;

