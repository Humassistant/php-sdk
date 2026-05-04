<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class OrganizationResource extends Resource
{
    /**
     * Get all organizations for the authenticated user.
     */
    public function list(): array
    {
        return $this->http->get('organizations');
    }

    /**
     * Create a new organization.
     */
    public function create(array $data): array
    {
        return $this->http->post('organizations', $data);
    }

    /**
     * Show a specific organization.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("organizations/{$uuid}");
    }

    /**
     * Update an organization.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("organizations/{$uuid}", $data);
    }

    /**
     * Delete an organization.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("organizations/{$uuid}");
    }

    /**
     * Transfer organization ownership.
     */
    public function transferOwnership(string $uuid, array $data): array
    {
        return $this->http->post("organizations/{$uuid}/transfer-ownership", $data);
    }

    /**
     * Get organization users.
     */
    public function users(string $uuid): array
    {
        return $this->http->get("organizations/{$uuid}/users");
    }

    /**
     * Add a user to an organization.
     */
    public function addUser(string $uuid, array $data): array
    {
        return $this->http->post("organizations/{$uuid}/users", $data);
    }

    /**
     * Update a user's role and permissions.
     */
    public function updateUser(string $uuid, string $userUuid, array $data): array
    {
        return $this->http->put("organizations/{$uuid}/users/{$userUuid}", $data);
    }

    /**
     * Remove a user from organization.
     */
    public function removeUser(string $uuid, string $userUuid): array
    {
        return $this->http->delete("organizations/{$uuid}/users/{$userUuid}");
    }

    /**
     * Get organization statistics.
     */
    public function stats(string $uuid): array
    {
        return $this->http->get("organizations/{$uuid}/stats");
    }

    /**
     * Update organization branding.
     */
    public function updateBranding(string $uuid, array $data): array
    {
        return $this->http->put("organizations/{$uuid}/branding", $data);
    }

    /**
     * Upload organization avatar.
     */
    public function uploadAvatar(string $uuid, string $filePath): array
    {
        return $this->http->upload("organizations/{$uuid}/avatar", $filePath, 'avatar');
    }

    /**
     * Delete organization avatar.
     */
    public function deleteAvatar(string $uuid): array
    {
        return $this->http->delete("organizations/{$uuid}/avatar");
    }

    // --- Subscription ---

    /**
     * Get organization subscription details.
     */
    public function subscription(string $uuid): array
    {
        return $this->http->get("organizations/{$uuid}/subscription");
    }

    /**
     * Create trial for organization.
     */
    public function createTrial(string $uuid, array $data = []): array
    {
        return $this->http->post("organizations/{$uuid}/subscription/trial", $data);
    }

    /**
     * Create checkout session.
     */
    public function createCheckout(string $uuid, array $data): array
    {
        return $this->http->post("organizations/{$uuid}/subscription/checkout", $data);
    }

    /**
     * Cancel organization subscription.
     */
    public function cancelSubscription(string $uuid): array
    {
        return $this->http->post("organizations/{$uuid}/subscription/cancel");
    }

    /**
     * Resume cancelled subscription.
     */
    public function resumeSubscription(string $uuid): array
    {
        return $this->http->post("organizations/{$uuid}/subscription/resume");
    }

    /**
     * Change subscription plan.
     */
    public function changePlan(string $uuid, array $data): array
    {
        return $this->http->post("organizations/{$uuid}/subscription/change-plan", $data);
    }

    // --- Transactions ---

    /**
     * Get all transactions for an organization.
     */
    public function transactions(string $uuid, array $query = []): array
    {
        return $this->http->get("organizations/{$uuid}/transactions", $query);
    }

    /**
     * Get a specific transaction.
     */
    public function transaction(string $uuid, string $transactionUuid): array
    {
        return $this->http->get("organizations/{$uuid}/transactions/{$transactionUuid}");
    }

    /**
     * Get payment URL for a transaction.
     */
    public function transactionPaymentUrl(string $uuid, string $transactionUuid): array
    {
        return $this->http->get("organizations/{$uuid}/transactions/{$transactionUuid}/payment-url");
    }

    /**
     * Get invoice URL for a transaction.
     */
    public function transactionInvoice(string $uuid, string $transactionUuid): array
    {
        return $this->http->get("organizations/{$uuid}/transactions/{$transactionUuid}/invoice");
    }
}
