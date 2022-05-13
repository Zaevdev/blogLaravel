<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Service\WeatherService;
use App\Models\{Category, Post};
use Illuminate\Contracts\{Foundation\Application, View\Factory, View\View};

class IndexController extends Controller
{
    private WeatherService $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function __invoke(): Factory|View|Application
    {
        $data = $this->service->getWeather();
        $posts = Post::paginate(10);
        $categories = Category::all();

        return view('blog.index', compact('categories', 'data', 'posts'));
    }
}
