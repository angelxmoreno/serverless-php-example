<?php
namespace FaaSPHP\Tests\Unit\Functions;

use FaaSPHP\Functions\CelsiusConverter;

describe(CelsiusConverter::class, function () {
    it('converts Celsius to Fahrenheit', function () {
        $fahrenheit = 32;
        $celsius = 0;
        $actual = (new CelsiusConverter($this->container))->run(
            $this->container->request,
            [
                'c' => $celsius
            ]
        );
        expect($actual)->toEqual([
            'fahrenheit' => $fahrenheit,
            'celsius' => $celsius
        ]);
    });
});