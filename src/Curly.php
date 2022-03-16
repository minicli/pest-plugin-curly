<?php

declare(strict_types=1);

namespace Minicli\PestCurlyPlugin;

use Minicli\Curly\Client;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
trait Curly
{
    public function get(string $endpoint): TestCase
    {
        $client   = $this->getCurly();
        $response = $client->get($endpoint);

        expect($response)->toBeArray()->toHaveKeys(['code', 'body']);
        expect($response['code'])->toBeIn([200, 301, 302]);

        return $this;
    }

    public function matchResponse(string $endpoint, int $code): TestCase
    {
        $client   = $this->getCurly();
        $response = $client->get($endpoint);

        expect($response)->toBeArray()->toHaveKeys(['code', 'body']);
        expect($response['code'])->toBe($code);

        return $this;
    }

    public function responseContains(string $endpoint, string $needle): TestCase
    {
        $client   = $this->getCurly();
        $response = $client->get($endpoint);

        expect($response)->toBeArray()->toHaveKeys(['code', 'body']);
        $this->assertStringContainsString($needle, $response['body']);

        return $this;
    }

    protected function getCurly(): Client
    {
        return new Client();
    }
}
