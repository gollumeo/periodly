<?php

declare(strict_types=1);

namespace Infrastructure\Laravel\Providers\Core;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as LaravelExceptionHandler;
use Illuminate\Support\ServiceProvider;

final class ExceptionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExceptionHandler::class, LaravelExceptionHandler::class);
    }
}
