<?php

use core\App;
use core\Container;

test('it can resolve something out of the container', function () {
    $container =  new Container;
    $container->bind('binding', function () {
        return 'Hey it works';
    });

    expect($container->resolve('binding'))->toEqual('Hey it works');

    $container->bind('foo', function ($name) {
        return $name;
    });

    expect($container->resolve('foo', ['Jason']))->toEqual('Jason');
});
