<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\DTO\Weather\WeatherDTO;
use App\Http\Service\Client\WeatherClient;
use Cache;

class WeatherService
{

    protected WeatherClient $client;

    protected const TIME_LIFE_CACHE = 60 * 60; // seconds * minutes

    public function __construct(WeatherClient $client)
    {
        $this->client = $client;
    }

    public function getWeather(): ?WeatherDTO
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