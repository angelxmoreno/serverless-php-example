<?php
namespace FaaSPHP\Functions;

use Slim\Http\Response;
use Zend\Diactoros\ServerRequest as Request;

/**
 * Class CelsiusConverter
 * @package FaaSPHP\Functions
 */
class CelsiusConverter extends BaseFunction
{
    public function run(Request $request, Response $response, array $args) : Response
    {
        $params = $request->getParsedBody();
        $c = isset($params['c']) ? (int)$params['c'] : 0;
        $f = ($c * 9 / 5) + 32;

        return $response->withJson([
            'celsius' => $c,
            'fahrenheit' => $f,
        ]);
    }
}
