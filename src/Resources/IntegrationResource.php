<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class IntegrationResource extends Resource
{
    /**
     * Get the full catalog of available integration services.
     */
    public function catalog(): array
    {
        return $this->http->get('integrations/catalog');
    }

    /**
     * List all active integration connections.
     */
    public function list(): array
    {
        return $this->http->get('integrations');
    }

    /**
     * Connect a new integration service.
     */
    public function connect(string $service, array $data): array
    {
        return $this->http->post("integrations/{$service}/connect", $data);
    }

    /**
     * Disconnect an integration connection.
     */
    public function disconnect(string $uuid): array
    {
        return $this->http->delete("integrations/{$uuid}");
    }

    /**
     * Re-verify an existing integration connection.
     */
    public function verify(string $uuid): array
    {
        return $this->http->post("integrations/{$uuid}/verify");
    }

    /**
     * Initiate OAuth for an integration.
     */
    public function oauthInitiate(string $service, array $data = []): array
    {
        return $this->http->post("integrations/{$service}/oauth/init", $data);
    }
}
