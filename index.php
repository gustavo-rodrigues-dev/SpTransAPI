<?php

require 'vendor/autoload.php';
require 'config.php';

// Setup custom Twig view
$twigView = new \Slim\Views\Twig();

$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView,
    'templates.path' => 'templates/',
));
$app->response->headers->set('Content-Type', 'application/json');
// Automatically load router files
$routers = glob('routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

$app->run();
