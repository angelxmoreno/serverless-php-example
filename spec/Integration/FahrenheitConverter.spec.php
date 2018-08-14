<?php
namespace FaaSPHP\Tests\Integration;

use FaaSPHP\Tests\Utility\SlimHelper;

describe('Integration', function () {
    context('/dev/f2c', function () {
        it('converts fahrenheit to celsius', function () {
            $request = SlimHelper::buildPostRequest('/dev/c2f', ['f' => 32]);
            $response = SlimHelper::getResponse($this->container->app, $request);
            expect($response)->toEqual([
                "celsius" => 0,
                "fahrenheit" => 32
            ]);
        });
    });
});

