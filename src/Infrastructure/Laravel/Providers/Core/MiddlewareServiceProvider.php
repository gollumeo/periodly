<?php

declare(strict_types=1);

namespace Infrastructure\Laravel\Providers\Core;

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * @phpstan-type MiddlewareGroups array<string, array<int, class-string>>
 * @phpstan-type MiddlewareAliases array<string, class-string>
 */
final class MiddlewareServiceProvider extends ServiceProvider
{
    public function boot(Router $router): void
    {
        $config = new Middleware();
        $config->statefulApi();

        foreach ($config->getMiddlewareGroups() as $group => $stack) {
            $router->middlewareGroup($group, $stack);
        }

        foreach ($config->getMiddlewareAliases() as $alias => $class) {
            $router->aliasMiddleware($alias, $class);
        }
    }
}
