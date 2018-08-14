<?php
/**
 * @var \Slim\App $slim
 */

use FaaSPHP\Functions;

$slim->group('/dev', function () {
    $this->post('/f2c', Functions\FahrenheitConverter::class);
    $this->post('/c2f', Functions\CelsiusConverter::class);
});
