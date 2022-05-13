<?php

declare(strict_types=1);

namespace App\Http\Service\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

class BaseClient
{
    protected LoggerInterface $logger;
    protected Client $client;

    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = $client;
    }

    public function get(string $link, array $header): string
    {
        try {
            $response = $this->client->get($link, $header);

            return $response->getBody()->getContents();
        } catch (GuzzleException $exception) {
            $this->logger->error($exception->getMessage());

            return 'Error';
        }
    }
}