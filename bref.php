<?php

use Bref\Application as BrefApplication;
use Bref\Bridge\Slim\SlimAdapter;
use Slim\App as SlimApp;

require __DIR__ . '/vendor/autoload.php';
$slim = new SlimApp;
require __DIR__ . '/config/routes.php';
$app = new BrefApplication;
$app->httpHandler(new SlimAdapter($slim));
$app->run();
