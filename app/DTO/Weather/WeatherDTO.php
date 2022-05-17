<?php

declare(strict_types=1);

namespace App\DTO\Weather;

use Carbon\Carbon;

final class WeatherDTO
{
    private int $temp;

    private int $tempFeelsLike;

    private string $condition;

    private Carbon $date;

    private string $location;

    private const FORMAT_DATE = 'MMMM Do YYYY, H:mm:ss';

    public function __construct(int $temp, int $tempFeelsLike, string $condition, Carbon $date, string $location)
    {
        $this->temp = $temp;
        $this->tempFeelsLike = $tempFeelsLike;
        $this->condition = $condition;
        $this->date = $date;
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date->isoFormat(self::FORMAT_DATE);
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