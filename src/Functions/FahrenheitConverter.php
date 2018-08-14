<?php
namespace FaaSPHP\Functions;

use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class FahrenheitConverter
 * @package FaaSPHP\Functions
 */
class FahrenheitConverter extends BaseFunction
{
    public function run(Request $request, array $post = []) : array
    {
        $f = isset($post['f']) ? (int)$post['f'] : 0;
        $c = ($f - 32) * .5556;

        return [
            'fahrenheit' => $f,
            'celsius' => $c,
        ];
    }
}
