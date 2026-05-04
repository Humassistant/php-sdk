<?php

declare(strict_types=1);

namespace Humassistant\Sdk;

use Humassistant\Sdk\Resources\AddonResource;
use Humassistant\Sdk\Resources\AffiliateResource;
use Humassistant\Sdk\Resources\AnalyticsResource;
use Humassistant\Sdk\Resources\AppointmentResource;
use Humassistant\Sdk\Resources\AuthResource;
use Humassistant\Sdk\Resources\CampaignResource;
use Humassistant\Sdk\Resources\ChatbotResource;
use Humassistant\Sdk\Resources\CompanyResource;
use Humassistant\Sdk\Resources\CustomerMetaFieldResource;
use Humassistant\Sdk\Resources\CustomerResource;
use Humassistant\Sdk\Resources\CustomerSegmentResource;
use Humassistant\Sdk\Resources\CustomerTagResource;
use Humassistant\Sdk\Resources\DashboardResource;
use Humassistant\Sdk\Resources\DataExportResource;
use Humassistant\Sdk\Resources\DocumentResource;
use Humassistant\Sdk\Resources\EmailClientResource;
use Humassistant\Sdk\Resources\FeedbackResource;
use Humassistant\Sdk\Resources\FormResource;
use Humassistant\Sdk\Resources\IntegrationResource;
use Humassistant\Sdk\Resources\MediaAssetResource;
use Humassistant\Sdk\Resources\MessengerResource;
use Humassistant\Sdk\Resources\NotificationDigestResource;
use Humassistant\Sdk\Resources\NotificationResource;
use Humassistant\Sdk\Resources\OrganizationResource;
use Humassistant\Sdk\Resources\SecurityResource;
use Humassistant\Sdk\Resources\SettingsResource;
use Humassistant\Sdk\Resources\SupportResource;
use Humassistant\Sdk\Resources\ThreadResource;
use Humassistant\Sdk\Resources\TwilioResource;
use Humassistant\Sdk\Resources\VoiceResource;
use Humassistant\Sdk\Resources\WhatsAppResource;
use Humassistant\Sdk\Resources\WidgetResource;
use Humassistant\Sdk\Resources\WorkspaceResource;

class Humassistant
{
    private HttpClient $http;

    /**
     * Create a new Humassistant SDK client.
     *
     * @param string $baseUrl The base URL of the Humassistant API (e.g. https://app.humassistant.com/api)
     * @param string|null $token JWT token for authentication
     * @param string|null $apiKey API key for authentication (alternative to JWT)
     * @param string|null $organizationUuid Organization UUID for multi-org accounts
     * @param int $timeout HTTP request timeout in seconds
     */
    public function __construct(
        string $baseUrl = 'https://app.humassistant.com/api',
        ?string $token = null,
        ?string $apiKey = null,
        ?string $organizationUuid = null,
        int $timeout = 30,
    ) {
        $this->http = new HttpClient($baseUrl, $token, $apiKey, $timeout);

        if ($organizationUuid) {
            $this->http->setOrganizationUuid($organizationUuid);
        }
    }

    /**
     * Set the JWT token for authenticated requests.
     */
    public function setToken(string $token): self
    {
        $this->http->setToken($token);

        return $this;
    }

    /**
     * Get the current JWT token.
     */
    public function getToken(): ?string
    {
        return $this->http->getToken();
    }

    /**
     * Set the organization UUID for multi-org accounts.
     */
    public function setOrganizationUuid(string $uuid): self
    {
        $this->http->setOrganizationUuid($uuid);

        return $this;
    }

    /**
     * Get the current organization UUID.
     */
    public function getOrganizationUuid(): ?string
    {
        return $this->http->getOrganizationUuid();
    }

    /**
     * Get the HTTP client instance.
     */
    public function getHttpClient(): HttpClient
    {
        return $this->http;
    }

    public function auth(): AuthResource
    {
        return new AuthResource($this->http);
    }

    public function chatbots(): ChatbotResource
    {
        return new ChatbotResource($this->http);
    }

    public function customers(): CustomerResource
    {
        return new CustomerResource($this->http);
    }

    public function customerTags(): CustomerTagResource
    {
        return new CustomerTagResource($this->http);
    }

    public function customerSegments(): CustomerSegmentResource
    {
        return new CustomerSegmentResource($this->http);
    }

    public function customerMetaFields(): CustomerMetaFieldResource
    {
        return new CustomerMetaFieldResource($this->http);
    }

    public function threads(): ThreadResource
    {
        return new ThreadResource($this->http);
    }

    public function campaigns(): CampaignResource
    {
        return new CampaignResource($this->http);
    }

    public function organizations(): OrganizationResource
    {
        return new OrganizationResource($this->http);
    }

    public function whatsapp(): WhatsAppResource
    {
        return new WhatsAppResource($this->http);
    }

    public function widgets(): WidgetResource
    {
        return new WidgetResource($this->http);
    }

    public function analytics(): AnalyticsResource
    {
        return new AnalyticsResource($this->http);
    }

    public function settings(): SettingsResource
    {
        return new SettingsResource($this->http);
    }

    public function security(): SecurityResource
    {
        return new SecurityResource($this->http);
    }

    public function dashboard(): DashboardResource
    {
        return new DashboardResource($this->http);
    }

    public function notifications(): NotificationResource
    {
        return new NotificationResource($this->http);
    }

    public function notificationDigests(): NotificationDigestResource
    {
        return new NotificationDigestResource($this->http);
    }

    public function companies(): CompanyResource
    {
        return new CompanyResource($this->http);
    }

    public function addons(): AddonResource
    {
        return new AddonResource($this->http);
    }

    public function forms(): FormResource
    {
        return new FormResource($this->http);
    }

    public function appointments(): AppointmentResource
    {
        return new AppointmentResource($this->http);
    }

    public function mediaAssets(): MediaAssetResource
    {
        return new MediaAssetResource($this->http);
    }

    public function integrations(): IntegrationResource
    {
        return new IntegrationResource($this->http);
    }

    public function dataExports(): DataExportResource
    {
        return new DataExportResource($this->http);
    }

    public function support(): SupportResource
    {
        return new SupportResource($this->http);
    }

    public function emailClients(): EmailClientResource
    {
        return new EmailClientResource($this->http);
    }

    public function twilio(): TwilioResource
    {
        return new TwilioResource($this->http);
    }

    public function messenger(): MessengerResource
    {
        return new MessengerResource($this->http);
    }

    public function feedbacks(): FeedbackResource
    {
        return new FeedbackResource($this->http);
    }

    public function documents(): DocumentResource
    {
        return new DocumentResource($this->http);
    }

    public function voice(): VoiceResource
    {
        return new VoiceResource($this->http);
    }

    public function affiliates(): AffiliateResource
    {
        return new AffiliateResource($this->http);
    }

    public function workspace(): WorkspaceResource
    {
        return new WorkspaceResource($this->http);
    }
}
