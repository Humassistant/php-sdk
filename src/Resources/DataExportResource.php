<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class DataExportResource extends Resource
{
    /**
     * List user's exports.
     */
    public function list(): array
    {
        return $this->http->get('data-exports');
    }

    /**
     * Request a new data export.
     */
    public function create(array $data): array
    {
        return $this->http->post('data-exports', $data);
    }

    /**
     * Get export status.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("data-exports/{$uuid}");
    }

    /**
     * Regenerate download URL.
     */
    public function regenerateUrl(string $uuid): array
    {
        return $this->http->post("data-exports/{$uuid}/regenerate-url");
    }

    /**
     * Track download.
     */
    public function trackDownload(string $uuid): array
    {
        return $this->http->post("data-exports/{$uuid}/track-download");
    }
}
