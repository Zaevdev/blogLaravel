<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Http\Service\WeatherService;
use Illuminate\View\View;

class WeatherComposer
{
    private WeatherService $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view): void
    {
        $view->with('weather', $this->service->getWeather());
    }
}