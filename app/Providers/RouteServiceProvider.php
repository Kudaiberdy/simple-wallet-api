<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function map(): void
    {
        $this->registerApiFileRoute('wallet');
    }

    public function registerApiFileRoute(string $fileName): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path("routes/api/$fileName.php"));
    }
}
