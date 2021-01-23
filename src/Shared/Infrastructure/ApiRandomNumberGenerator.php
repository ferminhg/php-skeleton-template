<?php

declare(strict_types=1);

namespace Devaway\Shared\Infrastructure;

use Devaway\Shared\Domain\RandomNumberGenerator;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ApiRandomNumberGenerator implements RandomNumberGenerator
{

    const API_URL = 'http://www.randomnumberapi.com/api/v1.0/random?min=100&max=1000&count=1';

    public function __construct(private HttpClientInterface $client)
    {
    }

    public function generate(): int
    {
        $response = $this->client->request(
            'GET',
            self::API_URL);

        $content = $response->toArray();

        if (count($content)) {
            return $content[0];
        }
        return 0;
    }
}
