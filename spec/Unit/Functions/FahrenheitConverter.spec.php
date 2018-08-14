<?php
namespace FaaSPHP\Tests\Unit\Functions;

use FaaSPHP\Functions\FahrenheitConverter;

describe(FahrenheitConverter::class, function () {
    it('converts Fahrenheit to Celsius', function () {
        $fahrenheit = 32;
        $celsius = 0;
        $actual = (new FahrenheitConverter($this->container))->run(
            $this->container->request,
            [
                'f' => $fahrenheit
            ]
        );
        expect($actual)->toEqual([
            'fahrenheit' => $fahrenheit,
            'celsius' => $celsius
        ]);
    });
});