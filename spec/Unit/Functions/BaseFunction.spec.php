<?php
namespace FaaSPHP\Tests\Unit\Functions;

use FaaSPHP\Functions\BaseFunction;
use Kahlan\Plugin\Double;

describe(BaseFunction::class, function () {
    given('baseFunction', function () {
        /** @var BaseFunction $mockChild */
        $mockChild = Double::instance([
            'extends' => BaseFunction::class,
            'args' => [$this->container]
        ]);
        allow($mockChild)->toReceive('run')->andReturn([]);

        return $mockChild;
    });
    it('passes post vars to child run method', function () {
        $post_vars = [
            'foo' => 'bar'
        ];
        allow($this->container->request)->toReceive('getParsedBody')->andReturn($post_vars);
        expect($this->baseFunction)->toReceive('run')->with($this->container->request, $post_vars);
        $this->baseFunction(
            $this->container->request,
            $this->container->response
        );
    });
});