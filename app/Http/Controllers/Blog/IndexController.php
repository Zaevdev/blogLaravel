<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Cache;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use JsonException;
use RuntimeException;

class IndexController extends Controller
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws JsonException
     */
    public function __invoke()
    {
        if (!Cache::has('weather')) {
            $url = 'https://api.weather.yandex.ru/v2/forecast';
            try {
                $response = $this->client->get($url, [
                    'query' => [
                        'lat' => '56.326887',
                        'lon' => '44.005986',
                        'lang' => 'ru_RU',
                    ],
                    'headers' => [
                        'X-Yandex-API-Key' => 'd1d6713d-ac8a-4530-92ec-38879bfa481e',
                    ]
                ]);
                $data = json_decode($response->getBody()->getContents(), 1, 512, JSON_THROW_ON_ERROR);
                Cache::put('weather', $data, 60*60*24);
            } catch (GuzzleException) {
                throw new RuntimeException("Запрос к $url не доступен.");
            }
        } else {
            $data = Cache::get('weather');
        }
        $posts = Post::paginate(5);
        $categories = Category::all();
        return view('blog.index', compact('categories', 'data', 'posts'));
    }
}
