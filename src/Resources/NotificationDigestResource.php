<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class NotificationDigestResource extends Resource
{
    /**
     * List all notification digests.
     */
    public function list(): array
    {
        return $this->http->get('notification-digests');
    }

    /**
     * Create a custom notification digest.
     */
    public function create(array $data): array
    {
        return $this->http->post('notification-digests', $data);
    }

    /**
     * Get available filter options for the condition builder.
     */
    public function filterOptions(): array
    {
        return $this->http->get('notification-digests/filter-options');
    }

    /**
     * Update a notification digest.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("notification-digests/{$uuid}", $data);
    }

    /**
     * Delete a custom notification digest.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("notification-digests/{$uuid}");
    }
}
