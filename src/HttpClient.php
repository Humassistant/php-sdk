<?php

declare(strict_types=1);

namespace Humassistant\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Utils;
use Humassistant\Sdk\Exceptions\AuthenticationException;
use Humassistant\Sdk\Exceptions\HumassistantException;
use Humassistant\Sdk\Exceptions\NotFoundException;
use Humassistant\Sdk\Exceptions\RateLimitException;
use Humassistant\Sdk\Exceptions\ValidationException;

class HttpClient
{
    private Client $client;

    public function __construct(
        private readonly string $baseUrl,
        private ?string $token = null,
        private ?string $apiKey = null,
        private readonly int $timeout = 30,
    ) {
        $this->client = new Client([
            'base_uri' => rtrim($this->baseUrl, '/') . '/',
            'timeout' => $this->timeout,
            'http_errors' => true,
        ]);
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function get(string $uri, array $query = []): array
    {
        return $this->request('GET', $uri, ['query' => $query]);
    }

    public function post(string $uri, array $data = []): array
    {
        return $this->request('POST', $uri, ['json' => $data]);
    }

    public function put(string $uri, array $data = []): array
    {
        return $this->request('PUT', $uri, ['json' => $data]);
    }

    public function patch(string $uri, array $data = []): array
    {
        return $this->request('PATCH', $uri, ['json' => $data]);
    }

    public function delete(string $uri, array $data = []): array
    {
        return $this->request('DELETE', $uri, ['json' => $data]);
    }

    public function upload(string $uri, string $filePath, string $fieldName = 'file', array $data = []): array
    {
        $multipart = [
            [
                'name' => $fieldName,
                'contents' => Utils::tryFopen($filePath, 'r'),
                'filename' => basename($filePath),
            ],
        ];

        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => (string) $value,
            ];
        }

        return $this->request('POST', $uri, ['multipart' => $multipart]);
    }

    private function request(string $method, string $uri, array $options = []): array
    {
        $options['headers'] = $this->buildHeaders($options);

        try {
            $response = $this->client->request($method, ltrim($uri, '/'), $options);
            $body = $response->getBody()->getContents();

            if (empty($body)) {
                return [];
            }

            return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (ClientException $e) {
            $this->handleClientException($e);
        } catch (ServerException $e) {
            throw new HumassistantException(
                'Server error: ' . $e->getResponse()->getBody()->getContents(),
                $e->getCode(),
                $e,
            );
        } catch (\JsonException $e) {
            throw new HumassistantException('Invalid JSON response', 0, $e);
        }
    }

    private function buildHeaders(array $options): array
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if (! isset($options['multipart'])) {
            $headers['Content-Type'] = 'application/json';
        }

        if ($this->token) {
            $headers['Authorization'] = 'Bearer ' . $this->token;
        } elseif ($this->apiKey) {
            $headers['Authorization'] = 'Bearer ' . $this->apiKey;
        }

        return $headers;
    }

    private function handleClientException(ClientException $e): never
    {
        $statusCode = $e->getResponse()->getStatusCode();
        $body = json_decode($e->getResponse()->getBody()->getContents(), true) ?? [];
        $message = $body['message'] ?? $e->getMessage();

        throw match ($statusCode) {
            401 => new AuthenticationException($message, $statusCode, $e),
            403 => new AuthenticationException($message, $statusCode, $e),
            404 => new NotFoundException($message, $statusCode, $e),
            422 => new ValidationException($message, $body['errors'] ?? [], $statusCode, $e),
            429 => new RateLimitException($message, $statusCode, $e),
            default => new HumassistantException($message, $statusCode, $e),
        };
    }
}
