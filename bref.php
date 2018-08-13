<?php

use Bref\Bridge\Slim\SlimAdapter;

require __DIR__.'/vendor/autoload.php';

$slim = new Slim\App;
$slim->get('/dev', function ($request, $response) {
    $response->getBody()->write('Hello world!');
    return $response;
});

$slim->get('/login', function ($request, $response) {
    $response->getBody()->write('wanna login?');
    return $response;
});

$app = new \Bref\Application;
$app->httpHandler(new SlimAdapter($slim));
$app->run();