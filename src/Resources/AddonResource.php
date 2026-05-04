<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class AddonResource extends Resource
{
    /**
     * List available addons.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('addons', $query);
    }

    /**
     * Get current addon usage.
     */
    public function usage(): array
    {
        return $this->http->get('addons/usage');
    }

    /**
     * Subscribe to an addon.
     */
    public function subscribe(array $data): array
    {
        return $this->http->post('addons/subscribe', $data);
    }

    /**
     * Change tier of an active recurring addon.
     */
    public function changeTier(array $data): array
    {
        return $this->http->put('addons/change-tier', $data);
    }

    /**
     * Cancel active addon.
     */
    public function cancel(array $data): array
    {
        return $this->http->post('addons/cancel', $data);
    }

    /**
     * Resume a cancelled addon.
     */
    public function resume(array $data): array
    {
        return $this->http->post('addons/resume', $data);
    }
}
