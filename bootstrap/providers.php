<?php

declare(strict_types=1);

use Infrastructure\Laravel\Providers\Core\MiddlewareServiceProvider;
use Infrastructure\Laravel\Providers\Core\RouteServiceProvider;

return [
    RouteServiceProvider::class,
    MiddlewareServiceProvider::class,
];
