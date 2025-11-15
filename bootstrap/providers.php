<?php

declare(strict_types=1);

use Infrastructure\Laravel\Providers\Core\MiddlewareServiceProvider;
use Infrastructure\Laravel\Providers\Core\RouteServiceProvider;

return [
    MiddlewareServiceProvider::class,
    RouteServiceProvider::class,
];
