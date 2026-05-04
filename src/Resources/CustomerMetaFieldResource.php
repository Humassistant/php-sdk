<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CustomerMetaFieldResource extends Resource
{
    /**
     * List all meta fields for the organization.
     */
    public function list(): array
    {
        return $this->http->get('customer-meta-fields');
    }

    /**
     * Create a new meta field.
     */
    public function create(array $data): array
    {
        return $this->http->post('customer-meta-fields', $data);
    }

    /**
     * Update a meta field.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("customer-meta-fields/{$uuid}", $data);
    }

    /**
     * Delete a meta field.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("customer-meta-fields/{$uuid}");
    }
}
