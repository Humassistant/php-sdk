<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class SecurityResource extends Resource
{
    /**
     * Get security overview.
     */
    public function overview(): array
    {
        return $this->http->get('security/overview');
    }

    /**
     * Change user password.
     */
    public function changePassword(array $data): array
    {
        return $this->http->post('security/change-password', $data);
    }

    /**
     * Generate 2FA secret and QR code URL.
     */
    public function setup2FA(): array
    {
        return $this->http->post('security/2fa/setup');
    }

    /**
     * Verify and enable 2FA.
     */
    public function verify2FA(array $data): array
    {
        return $this->http->post('security/2fa/verify', $data);
    }

    /**
     * Disable 2FA.
     */
    public function disable2FA(): array
    {
        return $this->http->post('security/2fa/disable');
    }

    /**
     * Get recovery codes.
     */
    public function recoveryCodes(): array
    {
        return $this->http->get('security/2fa/recovery-codes');
    }

    /**
     * Regenerate recovery codes.
     */
    public function regenerateRecoveryCodes(): array
    {
        return $this->http->post('security/2fa/recovery-codes/regenerate');
    }

    /**
     * Get active sessions.
     */
    public function sessions(): array
    {
        return $this->http->get('security/sessions');
    }

    /**
     * Revoke a specific session.
     */
    public function revokeSession(string $sessionId): array
    {
        return $this->http->delete("security/sessions/{$sessionId}");
    }

    /**
     * Revoke all other sessions.
     */
    public function revokeAllSessions(array $data = []): array
    {
        return $this->http->post('security/sessions/revoke-all', $data);
    }

    /**
     * Get login activity history.
     */
    public function loginActivity(array $query = []): array
    {
        return $this->http->get('security/login-activity', $query);
    }

    /**
     * Clear login activity history.
     */
    public function clearLoginActivity(): array
    {
        return $this->http->delete('security/login-activity');
    }
}
