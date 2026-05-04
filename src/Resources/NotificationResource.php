<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class NotificationResource extends Resource
{
    /**
     * Get all notifications.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('notifications', $query);
    }

    /**
     * Get notification analytics.
     */
    public function analytics(): array
    {
        return $this->http->get('notifications/analytics');
    }

    /**
     * Get a specific notification.
     */
    public function get(string $id): array
    {
        return $this->http->get("notifications/{$id}");
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead(): array
    {
        return $this->http->post('notifications/mark-all-read');
    }

    /**
     * Delete all read notifications.
     */
    public function clearRead(): array
    {
        return $this->http->delete('notifications/clear-read');
    }

    /**
     * Delete a notification.
     */
    public function delete(string $id): array
    {
        return $this->http->delete("notifications/{$id}");
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead(string $id): array
    {
        return $this->http->post("notifications/{$id}/read");
    }

    /**
     * Mark a notification as unread.
     */
    public function markAsUnread(string $id): array
    {
        return $this->http->post("notifications/{$id}/unread");
    }
}
