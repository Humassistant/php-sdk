<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class EmailClientResource extends Resource
{
    /**
     * List email clients.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('email-clients', $query);
    }

    /**
     * Create an email client.
     */
    public function create(array $data): array
    {
        return $this->http->post('email-clients', $data);
    }

    /**
     * Get email client by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("email-clients/{$uuid}");
    }

    /**
     * Update an email client.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("email-clients/{$uuid}", $data);
    }

    /**
     * Delete an email client.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("email-clients/{$uuid}");
    }

    /**
     * Get email client analytics.
     */
    public function analytics(): array
    {
        return $this->http->get('email-clients/analytics');
    }

    /**
     * Test email connection.
     */
    public function testConnection(string $uuid): array
    {
        return $this->http->post("email-clients/{$uuid}/test");
    }

    /**
     * Assign email client to a chatbot.
     */
    public function assignToChatbot(string $uuid, string $chatbotUuid): array
    {
        return $this->http->post("email-clients/{$uuid}/assign/{$chatbotUuid}");
    }

    /**
     * Unassign email client from chatbot.
     */
    public function unassignFromChatbot(string $uuid): array
    {
        return $this->http->post("email-clients/{$uuid}/unassign");
    }
}
