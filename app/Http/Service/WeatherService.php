<?php

declare(strict_types=1);

namespace App\Http\Service;

use Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Log\LoggerInterface;

class WeatherService
{
    protected LoggerInterface $logger;
    private Client $client;

    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @throws JsonException
     */
    public function getWeather(): array
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
                $data = json_decode(
                    $response->getBody()->getContents(),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
                Cache::put('weather', $data, 60 * 60 * 24);
            } catch (GuzzleException $exception) {
                $this->logger->error($exception->getMessage());
                $data = [];
            }
        } else {
            $data = Cache::get('weather');
        }

        return $data;
    }

}