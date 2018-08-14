<?php
namespace FaaSPHP\Functions;

use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class CelsiusConverter
 * @package FaaSPHP\Functions
 */
class CelsiusConverter extends BaseFunction
{
    public function run(Request $request, array $post = []) : array
    {
        $c = isset($post['c']) ? (int)$post['c'] : 0;
        $f = ($c * 9 / 5) + 32;

        return [
            'celsius' => $c,
            'fahrenheit' => $f,
        ];
    }
}
