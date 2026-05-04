<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CustomerResource extends Resource
{
    /**
     * Get all customers with filtering and pagination.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('customers', $query);
    }

    /**
     * Create a new customer.
     */
    public function create(array $data): array
    {
        return $this->http->post('customers', $data);
    }

    /**
     * Get customer by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("customers/{$uuid}");
    }

    /**
     * Update customer.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("customers/{$uuid}", $data);
    }

    /**
     * Delete customer.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("customers/{$uuid}");
    }

    /**
     * Get customer segments.
     */
    public function segments(): array
    {
        return $this->http->get('customers/segments');
    }

    /**
     * Get customer statistics.
     */
    public function statistics(array $query = []): array
    {
        return $this->http->get('customers/statistics', $query);
    }

    /**
     * Merge two customers into one.
     */
    public function merge(string $sourceUuid, array $data): array
    {
        return $this->http->post("customers/{$sourceUuid}/merge", $data);
    }

    /**
     * Get customer timeline.
     */
    public function timeline(string $uuid, array $query = []): array
    {
        return $this->http->get("customers/{$uuid}/timeline", $query);
    }

    /**
     * Get customer events.
     */
    public function events(string $uuid, array $query = []): array
    {
        return $this->http->get("customers/{$uuid}/events", $query);
    }

    /**
     * Store a customer event.
     */
    public function storeEvent(string $uuid, array $data): array
    {
        return $this->http->post("customers/{$uuid}/events", $data);
    }

    /**
     * Add a tag to a customer.
     */
    public function addTag(string $uuid, array $data): array
    {
        return $this->http->post("customers/{$uuid}/tags", $data);
    }

    /**
     * Remove a tag from a customer.
     */
    public function removeTag(string $uuid, string $tagUuid): array
    {
        return $this->http->delete("customers/{$uuid}/tags/{$tagUuid}");
    }

    // --- Import ---

    /**
     * Download import template CSV.
     */
    public function importTemplate(): array
    {
        return $this->http->get('customers/import/template');
    }

    /**
     * Preview import data from uploaded CSV/TSV.
     */
    public function importPreview(array $data): array
    {
        return $this->http->post('customers/import/preview', $data);
    }

    /**
     * Execute the import.
     */
    public function importExecute(array $data): array
    {
        return $this->http->post('customers/import/execute', $data);
    }
}
