<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\Http\Service\Client\WeatherClient;
use Cache;
use Psr\Log\LoggerInterface;

class WeatherService
{
    protected LoggerInterface $logger;
    protected WeatherClient $client;

    protected const TIME_LIFE_CACHE = 60 * 60; // seconds * minutes

    public function __construct(WeatherClient $client)
    {
        $this->client = $client;
    }

    public function getWeather(): mixed
    {
        if (!Cache::has('weather')) {
            $data = $this->client->getActualWeather();

            Cache::put('weather', $data, self::TIME_LIFE_CACHE);
        } else {
            $data = Cache::get('weather');
        }
        return $data;
    }
}