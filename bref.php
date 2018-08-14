<?php

use Bref\Application as BrefApplication;
use Bref\Bridge\Slim\SlimAdapter;
use Slim\App as SlimApp;
use Slim\Http\Response;
use Zend\Diactoros\ServerRequest as Request;

require __DIR__ . '/vendor/autoload.php';
$slim = new SlimApp;
$slim->post('/dev/f2c', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $f = (int)$params['f'];
    $c = ($f - 32) * .5556;

    return $response->withJson([
        'fahrenheit' => $f,
        'celsius' => $c,
    ]);
});
$slim->post('/dev/c2f', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $c = (int)$params['c'];
    $f = ($c * 9 / 5) + 32;

    return $response->withJson([
        'fahrenheit' => $f,
        'celsius' => $c,
    ]);
});
$slim->get('/dev', function (Request $request, Response $response) {
    $response->getBody()->write('Hello world!');

    return $response;
});
$app = new BrefApplication;
$app->httpHandler(new SlimAdapter($slim));
$app->run();