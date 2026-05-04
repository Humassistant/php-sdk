<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class MessengerResource extends Resource
{
    /**
     * Save Facebook user access token.
     */
    public function saveToken(array $data): array
    {
        return $this->http->post('messenger/oauth/token', $data);
    }

    /**
     * Disconnect Meta.
     */
    public function disconnect(): array
    {
        return $this->http->post('messenger/disconnect');
    }

    /**
     * List available Facebook Pages from Meta.
     */
    public function availablePages(): array
    {
        return $this->http->get('messenger/available-pages');
    }

    /**
     * Connect a Facebook Page.
     */
    public function connectPage(array $data): array
    {
        return $this->http->post('messenger/connect', $data);
    }

    /**
     * List all Messenger pages.
     */
    public function pages(): array
    {
        return $this->http->get('messenger/pages');
    }

    /**
     * Store a new Messenger page.
     */
    public function storePage(array $data): array
    {
        return $this->http->post('messenger/pages', $data);
    }

    /**
     * Get a single Messenger page.
     */
    public function getPage(string $uuid): array
    {
        return $this->http->get("messenger/pages/{$uuid}");
    }

    /**
     * Update a Messenger page.
     */
    public function updatePage(string $uuid, array $data): array
    {
        return $this->http->put("messenger/pages/{$uuid}", $data);
    }

    /**
     * Delete a Messenger page.
     */
    public function deletePage(string $uuid): array
    {
        return $this->http->delete("messenger/pages/{$uuid}");
    }

    /**
     * Subscribe page to app webhook events.
     */
    public function subscribePage(string $uuid): array
    {
        return $this->http->post("messenger/pages/{$uuid}/subscribe");
    }

    /**
     * Refresh Instagram account info.
     */
    public function refreshInstagramAccount(string $pageUuid): array
    {
        return $this->http->post("messenger/pages/{$pageUuid}/refresh-instagram");
    }

    /**
     * Update Instagram account settings.
     */
    public function updateInstagramAccount(string $pageUuid, string $igUuid, array $data): array
    {
        return $this->http->put("messenger/pages/{$pageUuid}/instagram/{$igUuid}", $data);
    }
}
