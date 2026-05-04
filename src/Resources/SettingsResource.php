<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class SettingsResource extends Resource
{
    /**
     * Get user profile.
     */
    public function profile(): array
    {
        return $this->http->get('settings/profile');
    }

    /**
     * Update user profile.
     */
    public function updateProfile(array $data): array
    {
        return $this->http->put('settings/profile', $data);
    }

    /**
     * Update user avatar.
     */
    public function updateAvatar(string $filePath): array
    {
        return $this->http->upload('settings/avatar', $filePath, 'avatar');
    }

    /**
     * Delete user avatar.
     */
    public function deleteAvatar(): array
    {
        return $this->http->delete('settings/avatar');
    }

    /**
     * Change password.
     */
    public function changePassword(array $data): array
    {
        return $this->http->post('settings/change-password', $data);
    }

    // --- API Keys ---

    /**
     * Get user's API keys.
     */
    public function apiKeys(): array
    {
        return $this->http->get('settings/api-keys');
    }

    /**
     * Create new API key.
     */
    public function createApiKey(array $data): array
    {
        return $this->http->post('settings/api-keys', $data);
    }

    /**
     * Delete API key.
     */
    public function deleteApiKey(string $keyId): array
    {
        return $this->http->delete("settings/api-keys/{$keyId}");
    }

    /**
     * Get API key analytics.
     */
    public function apiKeyAnalytics(): array
    {
        return $this->http->get('settings/api-keys/analytics');
    }

    // --- Tour State ---

    /**
     * Get tour state.
     */
    public function tourState(): array
    {
        return $this->http->get('settings/tour-state');
    }

    /**
     * Update tour state.
     */
    public function updateTourState(array $data): array
    {
        return $this->http->put('settings/tour-state', $data);
    }

    // --- WhatsApp Settings ---

    /**
     * Get WhatsApp settings.
     */
    public function whatsapp(): array
    {
        return $this->http->get('settings/whatsapp');
    }

    /**
     * Update WhatsApp webhook settings.
     */
    public function updateWhatsappWebhook(array $data): array
    {
        return $this->http->put('settings/whatsapp/webhook', $data);
    }

    // --- Email Settings ---

    /**
     * Get email client settings.
     */
    public function email(): array
    {
        return $this->http->get('settings/email');
    }

    /**
     * Update email client settings.
     */
    public function updateEmail(string $uuid, array $data): array
    {
        return $this->http->put("settings/email/{$uuid}", $data);
    }

    /**
     * Test email configuration.
     */
    public function testEmail(string $uuid): array
    {
        return $this->http->post("settings/email/{$uuid}/test");
    }

    // --- Channel Closure ---

    /**
     * Get channel closure settings.
     */
    public function channelClosure(): array
    {
        return $this->http->get('settings/channel-closure');
    }

    /**
     * Update channel closure settings.
     */
    public function updateChannelClosure(string $channel, array $data): array
    {
        return $this->http->put("settings/channel-closure/{$channel}", $data);
    }

    // --- Notification Preferences ---

    /**
     * Get notification preferences.
     */
    public function notificationPreferences(): array
    {
        return $this->http->get('settings/notification-preferences');
    }

    /**
     * Update notification preferences.
     */
    public function updateNotificationPreferences(array $data): array
    {
        return $this->http->put('settings/notification-preferences', $data);
    }

    // --- Data Deletion ---

    /**
     * Get pending data deletion request status.
     */
    public function dataDeletionStatus(): array
    {
        return $this->http->get('settings/data-deletion');
    }

    /**
     * Request data deletion.
     */
    public function requestDataDeletion(array $data): array
    {
        return $this->http->post('settings/data-deletion', $data);
    }

    /**
     * Cancel pending data deletion request.
     */
    public function cancelDataDeletion(): array
    {
        return $this->http->delete('settings/data-deletion');
    }

    // --- Email Domain ---

    /**
     * Get email domain configuration.
     */
    public function emailDomain(): array
    {
        return $this->http->get('settings/email-domain');
    }

    /**
     * Store email domain.
     */
    public function storeEmailDomain(array $data): array
    {
        return $this->http->post('settings/email-domain', $data);
    }

    /**
     * Delete email domain configuration.
     */
    public function deleteEmailDomain(): array
    {
        return $this->http->delete('settings/email-domain');
    }

    /**
     * Verify email domain DNS records.
     */
    public function verifyEmailDomain(): array
    {
        return $this->http->post('settings/email-domain/verify');
    }

    /**
     * Get unsubscribe settings for email domain.
     */
    public function unsubscribeSettings(): array
    {
        return $this->http->get('settings/email-domain/unsubscribe-settings');
    }

    /**
     * Update unsubscribe settings.
     */
    public function updateUnsubscribeSettings(array $data): array
    {
        return $this->http->put('settings/email-domain/unsubscribe-settings', $data);
    }

    /**
     * Get footer settings.
     */
    public function footerSettings(): array
    {
        return $this->http->get('settings/email-domain/footer-settings');
    }

    /**
     * Update footer settings.
     */
    public function updateFooterSettings(array $data): array
    {
        return $this->http->put('settings/email-domain/footer-settings', $data);
    }
}
