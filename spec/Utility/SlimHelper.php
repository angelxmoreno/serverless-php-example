<?php
namespace FaaSPHP\Tests\Utility;

use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class SlimHelper
 * @package FaaSPHP\Tests\Utility
 */
class SlimHelper
{
    /**
     * @param App $app
     * @param Request $request
     * @return array
     * @throws \Exception
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public static function getResponse(App $app, Request $request) : array
    {
        $response = $app->process($request, new Response());
        $body = $response->getBody();

        return json_decode((string)$body, true);
    }

    public static function buildGetRequest(string $uri, array $data = []) : Request
    {
        return static::buildRequest($uri, 'GET', $data);
    }

    public static function buildPostRequest(string $uri, array $data = []) : Request
    {
        return static::buildRequest($uri, 'POST', $data);
    }

    protected static function buildRequest(string $uri = '/', string $method = 'GET', array $data = []) : Request
    {
        $method = strtoupper($method);
        $env = $environment = Environment::mock([
            'REQUEST_URI' => $uri,
            'REQUEST_METHOD' => $method,
            'QUERY_STRING' => ($method == 'GET') ? http_build_query($data) : '',
            'HTTP_CONTENT_TYPE' => 'application/x-www-form-urlencoded'
        ]);
        $request = Request::createFromEnvironment($env);
        if ($method == 'POST') {
            $request->getBody()->write(json_encode($data));
        }

        return $request;
    }
}