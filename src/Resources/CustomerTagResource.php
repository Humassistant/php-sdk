<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CustomerTagResource extends Resource
{
    /**
     * Get all tags for the current organization.
     */
    public function list(): array
    {
        return $this->http->get('customer-tags');
    }

    /**
     * Create a new tag.
     */
    public function create(array $data): array
    {
        return $this->http->post('customer-tags', $data);
    }

    /**
     * Update a tag.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("customer-tags/{$uuid}", $data);
    }

    /**
     * Delete a tag.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("customer-tags/{$uuid}");
    }
}
