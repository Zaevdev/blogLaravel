<?php

declare(strict_types=1);

namespace App\DTO\Weather;

class WeatherDTO
{
    public int $temp;

    public int $tempFeelsLike;

    public string $condition;

    public function __construct($data)
    {
        $this->temp = $data['temp'];
        $this->tempFeelsLike = $data['feels_like'];
        $this->condition = $data['condition'];
    }

}