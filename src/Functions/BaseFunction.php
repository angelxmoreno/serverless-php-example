<?php
namespace FaaSPHP\Functions;

use Psr\Container\ContainerInterface;
use Slim\Http\Response;
use Zend\Diactoros\ServerRequest as Request;

/**
 * Class BaseFunction
 * @package FaaSPHP\Functions
 */
abstract class BaseFunction
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * BaseFunction constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args) : Response
    {
        return $this->run($request, $response, $args);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    abstract function run(Request $request, Response $response, array $args) : Response;
}
