<?php

use Crunz\Schedule;

$schedule = new Schedule();

$app = require_once(__DIR__ . '/../src/app.php');

foreach ($app['owm.zips'] as $zip => $intervalInMinutes) {

    $schedule->run(function () use ($zip, $intervalInMinutes) {
        $app = require_once(__DIR__ . '/../src/app.php');
        echo "Updating weather data.\n";
        /** @var \Services\OpenWeatherMapAPI $api */
        $api = $app['owm.api'];
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $app['orm.em'];

        $em->persist($api->getReport($zip));
        $em->flush();
    })
    ->every('minute', $intervalInMinutes)
    ->description('Update weather data for zip ' . $zip . '.');
}

return $schedule;