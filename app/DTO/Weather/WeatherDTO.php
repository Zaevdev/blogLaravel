<?php

declare(strict_types=1);

namespace App\DTO\Weather;

final class WeatherDTO
{
    private int $temp;

    private int $tempFeelsLike;

    private string $condition;

    public function __construct(int $temp, int $tempFeelsLike, string $condition)
    {
        $this->temp = $temp;
        $this->tempFeelsLike = $tempFeelsLike;
        $this->condition = $condition;
    }

    /**
     * @return int
     */
    public function getTemp(): int
    {
        return $this->temp;
    }

    /**
     * @return int
     */
    public function getTempFeelsLike(): int
    {
        return $this->tempFeelsLike;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }


}