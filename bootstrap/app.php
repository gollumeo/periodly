<?php

declare(strict_types = 1);

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Exceptions\Handler;


$app = Application::configure(basePath: dirname(__DIR__))->create();

$app->singleton(
    ExceptionHandler::class,
    Handler::class
);

return $app;
