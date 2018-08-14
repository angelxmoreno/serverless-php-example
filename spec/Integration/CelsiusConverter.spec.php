<?php
namespace FaaSPHP\Tests\Integration;

use FaaSPHP\Tests\Utility\SlimHelper;

describe('Integration', function () {
    context('/dev/c2f', function () {
        it('converts celsius to fahrenheit', function () {
            $request = SlimHelper::buildPostRequest('/dev/c2f', ['c' => 0]);
            $response = SlimHelper::getResponse($this->container->app, $request);
            expect($response)->toEqual([
                "celsius" => 0,
                "fahrenheit" => 32
            ]);
        });
    });
});

