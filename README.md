# Humassistant PHP SDK

PHP wrapper for the [Humassistant API](https://humassistant.com) - AI-powered conversational assistants with multi-channel communication.

## Requirements

- PHP 8.1+
- Guzzle 7.8+

## Installation

```bash
composer require humassistant/php-sdk
```

## Quick Start

### Authentication with API Key

The recommended way to authenticate. API keys can be created from the Humassistant dashboard under Settings > API Keys.

```php
use Humassistant\Sdk\Humassistant;

$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    organizationUuid: 'your-organization-uuid',
);

// Exchange API key for a JWT token (required before making API calls)
$client->auth()->token('your-api-key');
```

The `organizationUuid` header is required for most API endpoints. You can find your organization UUID by calling `$client->organizations()->list()` after authentication.

### Authentication with Email/Password

```php
$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    organizationUuid: 'your-organization-uuid',
);

// Login - token is automatically stored
$client->auth()->login('user@example.com', 'password');

// With 2FA
$client->auth()->login('user@example.com', 'password', '123456');
```

### Authentication with Existing JWT Token

```php
$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    token: 'your-jwt-token',
    organizationUuid: 'your-organization-uuid',
);
```

### Setting the Organization Dynamically

```php
// Find your organization UUID
$client->auth()->token('your-api-key');
$orgs = $client->organizations()->list();
$orgUuid = $orgs['data']['organizations'][0]['uuid'];

// Set the organization for subsequent requests
$client->setOrganizationUuid($orgUuid);
```

## Usage Examples

### CRM: Sync Customers from Your Application

A common use case is syncing users from your application to Humassistant as customers, with tags and email subscription status.

```php
use Humassistant\Sdk\Humassistant;
use Humassistant\Sdk\Exceptions\HumassistantException;

$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    organizationUuid: env('HUMASSISTANT_ORGANIZATION_UUID'),
);
$client->auth()->token(env('HUMASSISTANT_API_KEY'));

foreach ($users as $user) {
    try {
        // Create or update the customer
        if ($user->humassistant_id) {
            $customer = $client->customers()->update($user->humassistant_id, [
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'email'      => $user->email,
                'phone'      => $user->phone,
            ]);
        } else {
            $customer = $client->customers()->create([
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'email'      => $user->email,
                'phone'      => $user->phone,
            ]);
        }

        $customerUuid = $customer['data']['uuid'];

        // Set email subscription date (only available via update)
        if ($user->subscribed_to_newsletter) {
            $client->customers()->update($customerUuid, [
                'subscribed_email_at' => $user->subscribed_at->toIso8601String(),
            ]);
        }

        // Add tags
        $client->customers()->addTag($customerUuid, [
            'tag_uuid' => 'your-tag-uuid',
        ]);

        // Save the Humassistant ID for future syncs
        $user->humassistant_id = $customerUuid;
        $user->save();
    } catch (HumassistantException $e) {
        logger()->error("Sync failed for {$user->email}: {$e->getMessage()}");
    }
}
```

### Customer Management

```php
// List customers with filters
$customers = $client->customers()->list([
    'search' => 'john',
    'page' => 1,
]);

// Get customer details
$customer = $client->customers()->get('customer-uuid');

// Get customer timeline
$timeline = $client->customers()->timeline('customer-uuid');

// Merge duplicate customers
$client->customers()->merge('source-customer-uuid', [
    'target_uuid' => 'target-customer-uuid',
]);

// Manage tags
$tags = $client->customerTags()->list();
$client->customerTags()->create(['name' => 'VIP', 'color' => '#ff0000']);
$client->customers()->addTag('customer-uuid', ['tag_uuid' => 'tag-uuid']);
$client->customers()->removeTag('customer-uuid', 'tag-uuid');

// Customer segments
$segments = $client->customerSegments()->list();
$client->customerSegments()->create([
    'name' => 'VIP Customers',
    'type' => 'manual',
]);
$client->customerSegments()->addCustomers('segment-uuid', [
    'customer_uuids' => ['customer-uuid-1', 'customer-uuid-2'],
]);

// Email subscription management
$client->customers()->update('customer-uuid', [
    'subscribed_email_at' => '2025-01-15T10:00:00+00:00',
]);
// Unsubscribe
$client->customers()->update('customer-uuid', [
    'unsubscribed_email_at' => '2025-06-01T10:00:00+00:00',
]);

// WhatsApp subscription
$client->customers()->update('customer-uuid', [
    'subscribed_whatsapp_at' => '2025-01-15T10:00:00+00:00',
]);

// Import customers from CSV
$client->customers()->importPreview($csvData);
$client->customers()->importExecute($importData);
```

### Chatbots

```php
// List all chatbots
$chatbots = $client->chatbots()->list();

// Create a chatbot
$chatbot = $client->chatbots()->create([
    'name' => 'My Chatbot',
    'language' => 'it',
]);

// Get / update / delete
$chatbot = $client->chatbots()->get('chatbot-uuid');
$client->chatbots()->update('chatbot-uuid', ['name' => 'Updated Name']);
$client->chatbots()->delete('chatbot-uuid');

// Knowledge base contents
$contents = $client->chatbots()->listContents('chatbot-uuid');
$client->chatbots()->createContent('chatbot-uuid', [
    'title' => 'FAQ',
    'content' => 'Frequently asked questions...',
]);

// Import website content into knowledge base
$client->chatbots()->importWebsite('chatbot-uuid', [
    'url' => 'https://example.com',
]);

// AI-generated instructions
$client->chatbots()->generateInstructions('chatbot-uuid', [
    'description' => 'A customer support bot for an e-commerce store',
]);
```

### Threads (Conversations)

```php
// List threads with filters
$threads = $client->threads()->list([
    'status' => 'open',
    'chatbot_uuid' => 'chatbot-uuid',
]);

// Get thread with messages
$thread = $client->threads()->get('thread-uuid');
$messages = $client->threads()->messages('thread-uuid');

// Add operator message to thread
$client->threads()->addMessage('thread-uuid', [
    'content' => 'Hello, how can I help?',
    'role' => 'operator',
]);

// Thread lifecycle
$client->threads()->close('thread-uuid');
$client->threads()->reopen('thread-uuid');
$client->threads()->escalate('thread-uuid');
$client->threads()->releaseControl('thread-uuid');

// Organize threads
$client->threads()->trash('thread-uuid');
$client->threads()->spam('thread-uuid');
$client->threads()->restore('thread-uuid');
$client->threads()->favorite('thread-uuid');

// Folders
$folders = $client->threads()->listFolders();
$client->threads()->createFolder(['name' => 'Priority']);
$client->threads()->assignFolder('thread-uuid', ['folder_uuid' => 'folder-uuid']);
```

### Campaigns

```php
// Create and send a campaign
$campaign = $client->campaigns()->create([
    'name' => 'Welcome Campaign',
    'subject' => 'Welcome!',
]);
$client->campaigns()->send('campaign-uuid');

// Campaign lifecycle
$client->campaigns()->pause('campaign-uuid');
$client->campaigns()->cancel('campaign-uuid');
$client->campaigns()->duplicate('campaign-uuid');

// Preview and test
$client->campaigns()->preview('campaign-uuid');
$client->campaigns()->sendTest('campaign-uuid', ['email' => 'test@example.com']);
$client->campaigns()->recipientCount('campaign-uuid');

// Statistics
$stats = $client->campaigns()->statistics();
$sends = $client->campaigns()->sends('campaign-uuid');

// Email templates
$templates = $client->campaigns()->listTemplates();
$client->campaigns()->createTemplate([
    'name' => 'Welcome Template',
    'html' => '<h1>Welcome!</h1>',
]);
```

### Organizations and Billing

```php
// List organizations
$orgs = $client->organizations()->list();

// Manage team members
$users = $client->organizations()->users('org-uuid');
$client->organizations()->addUser('org-uuid', [
    'email' => 'newuser@example.com',
    'role' => 'member',
]);
$client->organizations()->updateUser('org-uuid', 'user-uuid', [
    'role' => 'admin',
]);

// Subscription management
$subscription = $client->organizations()->subscription('org-uuid');
$client->organizations()->changePlan('org-uuid', ['plan_id' => 'pro']);
$client->organizations()->cancelSubscription('org-uuid');

// Transactions and invoices
$transactions = $client->organizations()->transactions('org-uuid');
$invoice = $client->organizations()->transactionInvoice('org-uuid', 'transaction-uuid');
```

### Analytics

```php
// Chatbot performance
$sentiment = $client->analytics()->sentimentOverview('chatbot-uuid', [
    'from' => '2025-01-01',
    'to' => '2025-12-31',
]);
$volume = $client->analytics()->messageVolume('chatbot-uuid');
$heatmap = $client->analytics()->activityHeatmap('chatbot-uuid');
$gaps = $client->analytics()->contentGaps('chatbot-uuid');

// Channel analytics
$overview = $client->analytics()->channelsOverview();

// Campaign analytics
$campaignStats = $client->analytics()->campaignOverview();

// Dashboard
$overview = $client->dashboard()->overview();
$metrics = $client->dashboard()->performanceMetrics();
```

### WhatsApp

```php
// Accounts and phone numbers
$accounts = $client->whatsapp()->accounts();
$numbers = $client->whatsapp()->phoneNumbers('account-id');

// Templates
$templates = $client->whatsapp()->templates();
$client->whatsapp()->createTemplate([
    'name' => 'welcome_message',
    'language' => 'it',
    'category' => 'MARKETING',
]);
$client->whatsapp()->syncTemplates('account-id');
```

### Widgets

```php
$widgets = $client->widgets()->list();
$widget = $client->widgets()->create([
    'name' => 'Main Widget',
    'chatbot_uuid' => 'chatbot-uuid',
]);
$code = $client->widgets()->generateCode('widget-uuid');
```

### Media Assets

```php
$assets = $client->mediaAssets()->list();
$client->mediaAssets()->upload('/path/to/file.pdf', ['name' => 'Document']);
$url = $client->mediaAssets()->temporaryUrl('asset-uuid');
$client->mediaAssets()->makePublic('asset-uuid');
$usage = $client->mediaAssets()->storageUsage();
```

## Error Handling

```php
use Humassistant\Sdk\Exceptions\AuthenticationException;
use Humassistant\Sdk\Exceptions\NotFoundException;
use Humassistant\Sdk\Exceptions\ValidationException;
use Humassistant\Sdk\Exceptions\RateLimitException;
use Humassistant\Sdk\Exceptions\HumassistantException;

try {
    $chatbot = $client->chatbots()->get('invalid-uuid');
} catch (AuthenticationException $e) {
    // 401/403 - Invalid or expired token
} catch (NotFoundException $e) {
    // 404 - Resource not found
} catch (ValidationException $e) {
    // 422 - Validation errors
    $errors = $e->errors(); // ['field' => ['error message']]
} catch (RateLimitException $e) {
    // 429 - Too many requests
} catch (HumassistantException $e) {
    // Other API errors
}
```

## Available Resources

| Resource | Method | Description |
|---|---|---|
| `auth()` | `AuthResource` | Login, register, token, 2FA, SSO |
| `chatbots()` | `ChatbotResource` | CRUD, contents, avatars, voices, tool functions, emails |
| `customers()` | `CustomerResource` | CRUD, tags, events, import, merge |
| `customerTags()` | `CustomerTagResource` | CRUD for customer tags |
| `customerSegments()` | `CustomerSegmentResource` | CRUD, rule types, membership |
| `customerMetaFields()` | `CustomerMetaFieldResource` | CRUD for custom fields |
| `threads()` | `ThreadResource` | CRUD, messages, actions, folders, favorites |
| `campaigns()` | `CampaignResource` | CRUD, send, templates |
| `organizations()` | `OrganizationResource` | CRUD, users, subscription, transactions |
| `whatsapp()` | `WhatsAppResource` | Accounts, phone numbers, templates |
| `widgets()` | `WidgetResource` | CRUD, embed code |
| `analytics()` | `AnalyticsResource` | Chatbot, channel, campaign analytics |
| `settings()` | `SettingsResource` | Profile, API keys, email domain, preferences |
| `security()` | `SecurityResource` | 2FA, sessions, login activity |
| `dashboard()` | `DashboardResource` | Overview, activity, metrics |
| `notifications()` | `NotificationResource` | CRUD, read/unread |
| `notificationDigests()` | `NotificationDigestResource` | CRUD for digests |
| `companies()` | `CompanyResource` | CRUD for companies |
| `addons()` | `AddonResource` | Subscribe, cancel, change tier |
| `forms()` | `FormResource` | CRUD, submissions |
| `appointments()` | `AppointmentResource` | CRUD, Google sync |
| `mediaAssets()` | `MediaAssetResource` | Upload, manage, public/private |
| `integrations()` | `IntegrationResource` | Catalog, connect, OAuth |
| `dataExports()` | `DataExportResource` | Request and download exports |
| `support()` | `SupportResource` | Tickets, messages |
| `emailClients()` | `EmailClientResource` | CRUD, assign to chatbot |
| `twilio()` | `TwilioResource` | Account management |
| `messenger()` | `MessengerResource` | Pages, Instagram |
| `feedbacks()` | `FeedbackResource` | List and create |
| `documents()` | `DocumentResource` | Legal documents, accept |
| `voice()` | `VoiceResource` | Voice options, synthesis |
| `affiliates()` | `AffiliateResource` | Dashboard, earnings |
| `workspace()` | `WorkspaceResource` | Folders, files, threads, skills |

## License

MIT
