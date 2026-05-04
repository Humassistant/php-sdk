<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class TwilioResource extends Resource
{
    /**
     * List Twilio accounts.
     */
    public function list(): array
    {
        return $this->http->get('twilio/accounts');
    }

    /**
     * Create a Twilio account.
     */
    public function create(array $data): array
    {
        return $this->http->post('twilio/accounts', $data);
    }

    /**
     * Update a Twilio account.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("twilio/accounts/{$uuid}", $data);
    }

    /**
     * Delete a Twilio account.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("twilio/accounts/{$uuid}");
    }

    /**
     * Update webhooks on Twilio.
     */
    public function updateWebhooks(string $uuid): array
    {
        return $this->http->post("twilio/accounts/{$uuid}/update-webhooks");
    }
}
