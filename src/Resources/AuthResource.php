<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class AuthResource extends Resource
{
    /**
     * Login with email and password.
     */
    public function login(string $email, string $password, ?string $twoFactorCode = null): array
    {
        $data = [
            'email' => $email,
            'password' => $password,
        ];

        if ($twoFactorCode !== null) {
            $data['two_factor_code'] = $twoFactorCode;
        }

        $response = $this->http->post('login', $data);

        if (isset($response['data']['access_token'])) {
            $this->http->setToken($response['data']['access_token']);
        }

        return $response;
    }

    /**
     * Register a new user account.
     */
    public function register(array $data): array
    {
        return $this->http->post('auth/register', $data);
    }

    /**
     * Get token using API key.
     */
    public function token(string $apiKey): array
    {
        $response = $this->http->post('auth/token', ['api_key' => $apiKey]);

        if (isset($response['data']['access_token'])) {
            $this->http->setToken($response['data']['access_token']);
        }

        return $response;
    }

    /**
     * Refresh JWT token.
     */
    public function refresh(): array
    {
        $response = $this->http->post('refresh');

        if (isset($response['data']['access_token'])) {
            $this->http->setToken($response['data']['access_token']);
        }

        return $response;
    }

    /**
     * Logout user (invalidate token).
     */
    public function logout(): array
    {
        return $this->http->post('logout');
    }

    /**
     * Get authenticated user profile.
     */
    public function user(): array
    {
        return $this->http->get('user');
    }

    /**
     * Send password reset link.
     */
    public function forgotPassword(string $email): array
    {
        return $this->http->post('auth/forgot-password', ['email' => $email]);
    }

    /**
     * Reset password with token.
     */
    public function resetPassword(array $data): array
    {
        return $this->http->post('auth/reset-password', $data);
    }

    /**
     * Delete user account.
     */
    public function deleteAccount(): array
    {
        return $this->http->delete('account');
    }

    /**
     * Login or pre-register with Google.
     */
    public function googleLogin(array $data): array
    {
        return $this->http->post('auth/google', $data);
    }

    /**
     * Complete registration for a new Google user.
     */
    public function googleCompleteRegistration(array $data): array
    {
        return $this->http->post('auth/google/complete-registration', $data);
    }

    /**
     * Generate SSO token for cross-app authentication.
     */
    public function generateSSOToken(array $data): array
    {
        return $this->http->post('auth/sso/generate', $data);
    }

    /**
     * Exchange SSO token for permanent JWT token.
     */
    public function exchangeSSOToken(string $token): array
    {
        $response = $this->http->post('auth/sso/exchange', ['token' => $token]);

        if (isset($response['data']['access_token'])) {
            $this->http->setToken($response['data']['access_token']);
        }

        return $response;
    }

    /**
     * Validate account setup token.
     */
    public function validateSetupToken(string $token): array
    {
        return $this->http->post('auth/validate-setup-token', ['token' => $token]);
    }

    /**
     * Complete account setup.
     */
    public function completeSetup(array $data): array
    {
        return $this->http->post('auth/complete-setup', $data);
    }

    /**
     * Get documents accepted by the authenticated user.
     */
    public function acceptedDocuments(): array
    {
        return $this->http->get('user/documents');
    }
}
