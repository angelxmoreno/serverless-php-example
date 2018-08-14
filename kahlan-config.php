<?php
/**
 * @var Kahlan\Cli\Kahlan $this
 */

use Kahlan\Box\Box;
use Kahlan\Cli\CommandLine;
use Kahlan\Filter\Filters;
use Slim\Container;
use Kahlan\Plugin\Double;

/** @var CommandLine $commandLine */
$commandLine = $this->commandLine();
$commandLine->option('ff', 'default', 1);
$commandLine->option('cc', 'default', true);
$commandLine->option('reporter', 'default', 'verbose');
/** @var Box $box */
$container = new Container();
Filters::apply($this, 'run', function ($next) use ($container) {
    $scope = $this->suite()->root()->scope(); // The top most describe scope.
    $scope->container = $container;

    return $next();
});

$container['request'] = function (Container $c) {
    return Double::instance([
        'implements' => [\Psr\Http\Message\ServerRequestInterface::class]
    ]);
};
