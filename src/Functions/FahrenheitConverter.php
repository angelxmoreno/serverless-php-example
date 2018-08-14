<?php
namespace FaaSPHP\Functions;

use Slim\Http\Response;
use Zend\Diactoros\ServerRequest as Request;

/**
 * Class FahrenheitConverter
 * @package FaaSPHP\Functions
 */
class FahrenheitConverter extends BaseFunction
{
    public function run(Request $request, Response $response, array $args) : Response
    {
        $params = $request->getParsedBody();
        $f = isset($params['f']) ? (int)$params['f'] : 0;
        $c = ($f - 32) * .5556;

        return $response->withJson([
            'fahrenheit' => $f,
            'celsius' => $c,
        ]);
    }
}
