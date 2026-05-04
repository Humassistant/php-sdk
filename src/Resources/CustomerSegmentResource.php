<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CustomerSegmentResource extends Resource
{
    /**
     * Get all customer segments with statistics.
     */
    public function list(): array
    {
        return $this->http->get('customer-segments');
    }

    /**
     * Create a new customer segment.
     */
    public function create(array $data): array
    {
        return $this->http->post('customer-segments', $data);
    }

    /**
     * Get a specific customer segment.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("customer-segments/{$uuid}");
    }

    /**
     * Update a customer segment.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("customer-segments/{$uuid}", $data);
    }

    /**
     * Delete a customer segment.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("customer-segments/{$uuid}");
    }

    /**
     * Get available rule types for automatic segments.
     */
    public function ruleTypes(): array
    {
        return $this->http->get('customer-segments/rule-types');
    }

    /**
     * Refresh segment membership.
     */
    public function refresh(string $uuid): array
    {
        return $this->http->post("customer-segments/{$uuid}/refresh");
    }

    /**
     * Add customers to a manual segment.
     */
    public function addCustomers(string $uuid, array $data): array
    {
        return $this->http->post("customer-segments/{$uuid}/customers/add", $data);
    }

    /**
     * Remove customers from a manual segment.
     */
    public function removeCustomers(string $uuid, array $data): array
    {
        return $this->http->post("customer-segments/{$uuid}/customers/remove", $data);
    }

    /**
     * Get segment performance analytics.
     */
    public function analytics(string $uuid, array $query = []): array
    {
        return $this->http->get("customer-segments/{$uuid}/analytics", $query);
    }
}
