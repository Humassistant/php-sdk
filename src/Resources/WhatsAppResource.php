<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class WhatsAppResource extends Resource
{
    /**
     * Get all WhatsApp business accounts.
     */
    public function accounts(array $query = []): array
    {
        return $this->http->get('whatsapp/accounts', $query);
    }

    /**
     * Create or update WhatsApp business account.
     */
    public function storeAccount(array $data): array
    {
        return $this->http->post('whatsapp/accounts', $data);
    }

    /**
     * Get WhatsApp business account by UUID.
     */
    public function getAccount(string $uuid): array
    {
        return $this->http->get("whatsapp/accounts/{$uuid}");
    }

    /**
     * Check if user has any Meta Business connection.
     */
    public function connectionStatus(): array
    {
        return $this->http->get('whatsapp/connection-status');
    }

    /**
     * Exchange OAuth code for access token.
     */
    public function exchangeOAuthCode(array $data): array
    {
        return $this->http->post('whatsapp/oauth/exchange', $data);
    }

    /**
     * Get available WhatsApp Business accounts from Meta.
     */
    public function availableAccounts(): array
    {
        return $this->http->get('whatsapp/available-accounts');
    }

    /**
     * Connect WhatsApp Business Account to Meta.
     */
    public function connectAccount(array $data): array
    {
        return $this->http->post('whatsapp/accounts/connect', $data);
    }

    /**
     * Disconnect WhatsApp Business Account.
     */
    public function disconnectAccount(string $accountId): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/disconnect");
    }

    /**
     * Get Meta connection status for specific account.
     */
    public function accountConnectionStatus(string $accountId): array
    {
        return $this->http->get("whatsapp/accounts/{$accountId}/connection-status");
    }

    /**
     * Toggle WhatsApp Business Account enabled status.
     */
    public function toggleAccountEnabled(string $accountId, array $data = []): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/toggle-enabled", $data);
    }

    // --- Phone Numbers ---

    /**
     * Get phone numbers for an account.
     */
    public function phoneNumbers(string $accountId): array
    {
        return $this->http->get("whatsapp/accounts/{$accountId}/phone-numbers");
    }

    /**
     * Add phone number to business account.
     */
    public function addPhoneNumber(string $accountId, array $data): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/phone-numbers", $data);
    }

    /**
     * Get single phone number details.
     */
    public function getPhoneNumber(string $accountId, string $phoneNumberId): array
    {
        return $this->http->get("whatsapp/accounts/{$accountId}/phone-numbers/{$phoneNumberId}");
    }

    /**
     * Update phone number information.
     */
    public function updatePhoneNumber(string $accountId, string $phoneNumberId, array $data): array
    {
        return $this->http->put("whatsapp/accounts/{$accountId}/phone-numbers/{$phoneNumberId}", $data);
    }

    /**
     * Remove phone number.
     */
    public function removePhoneNumber(string $accountId, string $phoneNumberId): array
    {
        return $this->http->delete("whatsapp/accounts/{$accountId}/phone-numbers/{$phoneNumberId}");
    }

    /**
     * Toggle phone number enabled status.
     */
    public function togglePhoneNumberEnabled(string $accountId, string $phoneNumberId, array $data = []): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/phone-numbers/{$phoneNumberId}/toggle-enabled", $data);
    }

    /**
     * Sync phone numbers from Facebook.
     */
    public function syncPhoneNumbers(string $accountId): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/phone-numbers/sync");
    }

    /**
     * Request verification code for phone number.
     */
    public function requestVerificationCode(string $phoneNumberId, array $data): array
    {
        return $this->http->post("whatsapp/phone-numbers/{$phoneNumberId}/request-verification", $data);
    }

    /**
     * Verify phone number with code.
     */
    public function verifyPhoneNumber(string $phoneNumberId, array $data): array
    {
        return $this->http->post("whatsapp/phone-numbers/{$phoneNumberId}/verify", $data);
    }

    /**
     * Register phone number with PIN.
     */
    public function registerPhoneNumber(string $phoneNumberId, array $data): array
    {
        return $this->http->post("whatsapp/phone-numbers/{$phoneNumberId}/register", $data);
    }

    /**
     * Refresh phone number information.
     */
    public function refreshPhoneNumber(string $phoneNumberId): array
    {
        return $this->http->post("whatsapp/phone-numbers/{$phoneNumberId}/refresh");
    }

    // --- Templates ---

    /**
     * Get message templates.
     */
    public function templates(array $query = []): array
    {
        return $this->http->get('whatsapp/templates', $query);
    }

    /**
     * Create message template.
     */
    public function createTemplate(array $data): array
    {
        return $this->http->post('whatsapp/templates', $data);
    }

    /**
     * Sync message templates from Meta.
     */
    public function syncTemplates(string $accountId): array
    {
        return $this->http->post("whatsapp/accounts/{$accountId}/sync-templates");
    }

    /**
     * Update a WhatsApp template.
     */
    public function updateTemplate(string $accountId, string $templateId, array $data): array
    {
        return $this->http->put("whatsapp/accounts/{$accountId}/templates/{$templateId}", $data);
    }

    /**
     * Delete a WhatsApp template.
     */
    public function deleteTemplate(string $accountId, string $templateId): array
    {
        return $this->http->delete("whatsapp/accounts/{$accountId}/templates/{$templateId}");
    }

    /**
     * Push template to Meta.
     */
    public function pushTemplateToMeta(string $templateUuid): array
    {
        return $this->http->post("whatsapp/templates/{$templateUuid}/push-to-meta");
    }

    /**
     * Get WhatsApp analytics.
     */
    public function analytics(array $query = []): array
    {
        return $this->http->get('whatsapp/analytics', $query);
    }
}
