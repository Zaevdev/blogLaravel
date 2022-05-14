<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Service\WeatherService;
use App\Models\{Category, Post};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class ShowController extends Controller
{
    private WeatherService $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Post $post): Factory|View|Application
    {
        $weather = $this->service->getWeather();
        $categories = Category::all();

        return view('blog.show', compact('categories', 'weather', 'post'));
    }
}
