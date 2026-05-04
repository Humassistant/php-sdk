<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class MediaAssetResource extends Resource
{
    /**
     * List media assets.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('media-assets', $query);
    }

    /**
     * Upload a new media asset.
     */
    public function upload(string $filePath, array $data = []): array
    {
        return $this->http->upload('media-assets', $filePath, 'file', $data);
    }

    /**
     * Get a media asset by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("media-assets/{$uuid}");
    }

    /**
     * Delete a media asset.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("media-assets/{$uuid}");
    }

    /**
     * Get storage usage and limit.
     */
    public function storageUsage(): array
    {
        return $this->http->get('media-assets/storage-usage');
    }

    /**
     * Generate a temporary URL for viewing.
     */
    public function temporaryUrl(string $uuid): array
    {
        return $this->http->get("media-assets/{$uuid}/temporary-url");
    }

    /**
     * Make a media asset publicly accessible.
     */
    public function makePublic(string $uuid): array
    {
        return $this->http->post("media-assets/{$uuid}/make-public");
    }

    /**
     * Make a media asset private.
     */
    public function makePrivate(string $uuid): array
    {
        return $this->http->post("media-assets/{$uuid}/make-private");
    }
}
