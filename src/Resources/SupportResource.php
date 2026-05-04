<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class SupportResource extends Resource
{
    /**
     * Get all tickets with filtering and pagination.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('support', $query);
    }

    /**
     * Create new support ticket.
     */
    public function create(array $data): array
    {
        return $this->http->post('support', $data);
    }

    /**
     * Get support ticket by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("support/{$uuid}");
    }

    /**
     * Update support ticket.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("support/{$uuid}", $data);
    }

    /**
     * Delete support ticket.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("support/{$uuid}");
    }

    /**
     * Get support analytics.
     */
    public function analytics(): array
    {
        return $this->http->get('support/analytics');
    }

    /**
     * Get available support agents.
     */
    public function agents(): array
    {
        return $this->http->get('support/agents');
    }

    /**
     * Assign ticket to support agent.
     */
    public function assign(string $uuid, array $data): array
    {
        return $this->http->post("support/{$uuid}/assign", $data);
    }

    /**
     * Get ticket messages.
     */
    public function messages(string $uuid, array $query = []): array
    {
        return $this->http->get("support/{$uuid}/messages", $query);
    }

    /**
     * Add message to support ticket.
     */
    public function addMessage(string $uuid, array $data): array
    {
        return $this->http->post("support/{$uuid}/messages", $data);
    }
}
