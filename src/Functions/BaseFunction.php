<?php
namespace FaaSPHP\Functions;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;

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
     * @return Response
     */
    public function __invoke(Request $request, Response $response) : Response
    {
        $post = $this->getPostVariables($request);
        $data = $this->run($request, $post);

        return $response->withJson($data);
    }

    protected function getPostVariables(Request $request) : array
    {
        $body = $request->getParsedBody();

        return is_array($body) ? $body : [];
    }

    /**
     * @param Request $request
     * @param array $post
     * @return array
     */
    abstract function run(Request $request, array $post = []) : array;
}
