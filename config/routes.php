<?php
/**
 * @var \Slim\App $slim
 */

use FaaSPHP\Functions;

$slim->any('/', function ($request, \Slim\Http\Response $response) {
    var_dump($this->environment);
    return $response->withJson($this->environment);
});
$slim->group('/dev', function () {
    $this->post('/f2c', Functions\FahrenheitConverter::class);
    $this->post('/c2f', Functions\CelsiusConverter::class);
});
