<?php
/**
 * @var \Slim\App $slim
 */

use FaaSPHP\Functions;

$slim->post('/f2c', Functions\FahrenheitConverter::class);
$slim->post('/c2f', Functions\CelsiusConverter::class);
