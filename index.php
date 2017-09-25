<?php

$app = require_once __DIR__ . '/src/app.php';
$app['debug'] = true;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpKernel\HttpKernelInterface;

$app->get('/reports', function (Silex\Application $app) {
    /** @var \Doctrine\ORM\EntityManager $em */
    $em = $app['orm.em'];

    $reports = $em->getRepository('Models\Report')->findAll();

    return $app->json($reports);
});

$app->get('/reports/{zip}', function (Silex\Application $app, $zip) {
    /** @var \Doctrine\ORM\EntityManager $em */
    $em = $app['orm.em'];

    $reports = $em->getRepository('Models\Report')->findByZip($zip);

    return $app->json($reports);
});

$app->get('/', function (Silex\Application $app) {
    $subRequest = Request::create('/reports', 'GET');

    return $app->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
});

$app->run();