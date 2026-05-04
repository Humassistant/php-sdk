<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class CompanyResource extends Resource
{
    /**
     * List all companies.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('companies', $query);
    }

    /**
     * Create a new company.
     */
    public function create(array $data): array
    {
        return $this->http->post('companies', $data);
    }

    /**
     * Get company by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("companies/{$uuid}");
    }

    /**
     * Update a company.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("companies/{$uuid}", $data);
    }

    /**
     * Delete a company.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("companies/{$uuid}");
    }

    /**
     * Get distinct company-customer roles.
     */
    public function roles(): array
    {
        return $this->http->get('companies/roles');
    }
}
