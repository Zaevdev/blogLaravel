<?php

declare(strict_types=1);

namespace App\Providers;

use App\View\Composers\CategoryComposer;
use App\View\Composers\WeatherComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('blog*', WeatherComposer::class);
        View::composer('blog*', CategoryComposer::class);

    }
}
