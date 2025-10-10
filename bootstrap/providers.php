<?php

declare(strict_types=1);

use Infrastructure\Laravel\Providers\Core\ExceptionServiceProvider;
use Infrastructure\Laravel\Providers\Core\MiddlewareServiceProvider;
use Infrastructure\Laravel\Providers\Core\RouteServiceProvider;

return [
    ExceptionServiceProvider::class,
    MiddlewareServiceProvider::class,
    RouteServiceProvider::class,
];
