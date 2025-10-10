<?php

declare(strict_types=1);

namespace Infrastructure\Laravel\Providers\Core;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::middleware('api')
            ->group(base_path('src/Presentation/Http/routes/http.php'));
    }
}
