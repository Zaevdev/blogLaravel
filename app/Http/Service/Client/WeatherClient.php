<?php

declare(strict_types=1);

namespace App\Http\Service\Client;

use App\DTO\Weather\WeatherDTO;
use Carbon\Carbon;
use JetBrains\PhpStorm\ArrayShape;
use JsonException;
use Psr\Log\LoggerInterface;

class WeatherClient
{
    protected LoggerInterface $logger;

    protected BaseClient $client;

    protected const LINK = 'https://api.weather.yandex.ru/v2/forecast';

    private string $lat = '56.326887';

    private string $lon = '44.005986';

    private string $lang = 'en_EN';

    public function __construct(BaseClient $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getActualWeather(): ?WeatherDTO
    {
        $response = $this->client->get(self::LINK, $this->getHeader());

        try {
            $response = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

            return new WeatherDTO(
                $response['fact']['temp'],
                $response['fact']['feels_like'],
                $response['fact']['condition'],
                Carbon::parse($response['now_dt'])->setTimezone('Europe/Moscow'),
                $response['geo_object']['locality']['name'],
            );
        } catch (JsonException $exception) {
            $this->logger->error($exception->getMessage());

            return null;
        }
    }

    #[ArrayShape(['query' => "array", 'headers' => "array"])]
    public function getHeader(): array
    {
        return [
            'query' => [
                'lat' => $this->lat,
                'lon' => $this->lon,
                'lang' => $this->lang,
            ],
            'headers' => [
                'X-Yandex-API-Key' => env('YANDEX_API_KEY_WEATHER'),
            ]
        ];
    }
}