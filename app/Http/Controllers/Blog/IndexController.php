<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Service\WeatherService;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JsonException;

class IndexController extends Controller
{
    private WeatherService $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws JsonException
     */
    public function __invoke(): Factory|View|Application
    {
        $data = $this->service->getWeather();
        $posts = Post::paginate(5);
        $categories = Category::all();
        return view('blog.index', compact('categories', 'data', 'posts'));
    }
}
