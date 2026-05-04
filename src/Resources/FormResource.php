<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class FormResource extends Resource
{
    /**
     * List all forms.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('forms', $query);
    }

    /**
     * Create a new form.
     */
    public function create(array $data): array
    {
        return $this->http->post('forms', $data);
    }

    /**
     * Get a form by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("forms/{$uuid}");
    }

    /**
     * Update a form.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("forms/{$uuid}", $data);
    }

    /**
     * Delete a form.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("forms/{$uuid}");
    }

    /**
     * Get customer fields for form mapping.
     */
    public function customerFields(): array
    {
        return $this->http->get('forms/customer-fields');
    }

    /**
     * Get form submissions.
     */
    public function submissions(string $uuid, array $query = []): array
    {
        return $this->http->get("forms/{$uuid}/submissions", $query);
    }

    /**
     * Duplicate a form.
     */
    public function duplicate(string $uuid): array
    {
        return $this->http->post("forms/{$uuid}/duplicate");
    }
}
