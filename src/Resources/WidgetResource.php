<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class WidgetResource extends Resource
{
    /**
     * List all widgets.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('widgets', $query);
    }

    /**
     * Create a new widget.
     */
    public function create(array $data): array
    {
        return $this->http->post('widgets', $data);
    }

    /**
     * Get widget by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("widgets/{$uuid}");
    }

    /**
     * Update a widget.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("widgets/{$uuid}", $data);
    }

    /**
     * Delete a widget.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("widgets/{$uuid}");
    }

    /**
     * Generate embed code for the widget.
     */
    public function generateCode(string $uuid): array
    {
        return $this->http->post("widgets/{$uuid}/generate-code");
    }
}
