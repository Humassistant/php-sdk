<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CampaignResource extends Resource
{
    /**
     * List campaigns.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('campaigns', $query);
    }

    /**
     * Create a new campaign.
     */
    public function create(array $data): array
    {
        return $this->http->post('campaigns', $data);
    }

    /**
     * Get campaign by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("campaigns/{$uuid}");
    }

    /**
     * Update a campaign.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("campaigns/{$uuid}", $data);
    }

    /**
     * Delete a draft campaign.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("campaigns/{$uuid}");
    }

    /**
     * Get campaign statistics overview.
     */
    public function statistics(array $query = []): array
    {
        return $this->http->get('campaigns/statistics', $query);
    }

    /**
     * Send or schedule a campaign.
     */
    public function send(string $uuid, array $data = []): array
    {
        return $this->http->post("campaigns/{$uuid}/send", $data);
    }

    /**
     * Pause a sending campaign.
     */
    public function pause(string $uuid): array
    {
        return $this->http->post("campaigns/{$uuid}/pause");
    }

    /**
     * Cancel a campaign.
     */
    public function cancel(string $uuid): array
    {
        return $this->http->post("campaigns/{$uuid}/cancel");
    }

    /**
     * Send a test email.
     */
    public function sendTest(string $uuid, array $data): array
    {
        return $this->http->post("campaigns/{$uuid}/send-test", $data);
    }

    /**
     * Duplicate a campaign.
     */
    public function duplicate(string $uuid): array
    {
        return $this->http->post("campaigns/{$uuid}/duplicate");
    }

    /**
     * Get campaign sends with pagination.
     */
    public function sends(string $uuid, array $query = []): array
    {
        return $this->http->get("campaigns/{$uuid}/sends", $query);
    }

    /**
     * Get a rendered HTML preview.
     */
    public function preview(string $uuid, array $query = []): array
    {
        return $this->http->get("campaigns/{$uuid}/preview", $query);
    }

    /**
     * Get recipient count for a campaign.
     */
    public function recipientCount(string $uuid): array
    {
        return $this->http->get("campaigns/{$uuid}/recipient-count");
    }

    // --- Email Templates ---

    /**
     * List email templates.
     */
    public function listTemplates(array $query = []): array
    {
        return $this->http->get('campaign-email-templates', $query);
    }

    /**
     * Create an email template.
     */
    public function createTemplate(array $data): array
    {
        return $this->http->post('campaign-email-templates', $data);
    }

    /**
     * Get an email template.
     */
    public function getTemplate(string $uuid): array
    {
        return $this->http->get("campaign-email-templates/{$uuid}");
    }

    /**
     * Update an email template.
     */
    public function updateTemplate(string $uuid, array $data): array
    {
        return $this->http->put("campaign-email-templates/{$uuid}", $data);
    }

    /**
     * Delete an email template.
     */
    public function deleteTemplate(string $uuid): array
    {
        return $this->http->delete("campaign-email-templates/{$uuid}");
    }
}
