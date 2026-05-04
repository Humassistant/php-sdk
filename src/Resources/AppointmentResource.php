<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class AppointmentResource extends Resource
{
    /**
     * List all appointments.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('appointments', $query);
    }

    /**
     * Create a new appointment.
     */
    public function create(array $data): array
    {
        return $this->http->post('appointments', $data);
    }

    /**
     * Get appointment by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("appointments/{$uuid}");
    }

    /**
     * Update an appointment.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("appointments/{$uuid}", $data);
    }

    /**
     * Delete an appointment.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("appointments/{$uuid}");
    }

    /**
     * Sync appointments from Google Calendar.
     */
    public function syncGoogle(): array
    {
        return $this->http->post('appointments/sync-google');
    }
}
