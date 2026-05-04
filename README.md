# Humassistant PHP SDK

PHP wrapper for the [Humassistant API](https://humassistant.com) - AI-powered conversational assistants with multi-channel communication.

## Requirements

- PHP 8.2+
- Guzzle 7.8+

## Installation

```bash
composer require humassistant/php-sdk
```

## Quick Start

### Authentication with API Key

```php
use Humassistant\Sdk\Humassistant;

$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    apiKey: 'your-api-key',
);
```

### Authentication with Email/Password

```php
use Humassistant\Sdk\Humassistant;

$client = new Humassistant('https://app.humassistant.com/api');

// Login - token is automatically stored
$response = $client->auth()->login('user@example.com', 'password');

// With 2FA
$response = $client->auth()->login('user@example.com', 'password', '123456');
```

### Authentication with Existing Token

```php
$client = new Humassistant(
    baseUrl: 'https://app.humassistant.com/api',
    token: 'your-jwt-token',
);
```

## Usage Examples

### Chatbots

```php
// List all chatbots
$chatbots = $client->chatbots()->list();

// Create a chatbot
$chatbot = $client->chatbots()->create([
    'name' => 'My Chatbot',
    'language' => 'it',
]);

// Get a specific chatbot
$chatbot = $client->chatbots()->get('chatbot-uuid');

// Update a chatbot
$client->chatbots()->update('chatbot-uuid', [
    'name' => 'Updated Name',
]);

// Delete a chatbot
$client->chatbots()->delete('chatbot-uuid');

// Manage chatbot contents
$contents = $client->chatbots()->listContents('chatbot-uuid');
$client->chatbots()->createContent('chatbot-uuid', [
    'title' => 'FAQ',
    'content' => 'Frequently asked questions...',
]);

// Import website content
$client->chatbots()->importWebsite('chatbot-uuid', [
    'url' => 'https://example.com',
]);
```

### Customers

```php
// List customers with filters
$customers = $client->customers()->list([
    'search' => 'john',
    'page' => 1,
]);

// Create a customer
$customer = $client->customers()->create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
]);

// Get customer timeline
$timeline = $client->customers()->timeline('customer-uuid');

// Manage tags
$client->customers()->addTag('customer-uuid', [
    'tag_uuid' => 'tag-uuid',
]);

// Customer segments
$segments = $client->customerSegments()->list();
$client->customerSegments()->create([
    'name' => 'VIP Customers',
    'type' => 'manual',
]);
```

### Threads (Conversations)

```php
// List threads
$threads = $client->threads()->list([
    'status' => 'open',
    'chatbot_uuid' => 'chatbot-uuid',
]);

// Get thread with messages
$thread = $client->threads()->get('thread-uuid');

// Add message to thread
$client->threads()->addMessage('thread-uuid', [
    'content' => 'Hello, how can I help?',
    'role' => 'operator',
]);

// Close/reopen threads
$client->threads()->close('thread-uuid');
$client->threads()->reopen('thread-uuid');

// Escalate to operator
$client->threads()->escalate('thread-uuid');

// Thread folders
$folders = $client->threads()->listFolders();
$client->threads()->assignFolder('thread-uuid', [
    'folder_uuid' => 'folder-uuid',
]);
```

### Campaigns

```php
// List campaigns
$campaigns = $client->campaigns()->list();

// Create a campaign
$campaign = $client->campaigns()->create([
    'name' => 'Welcome Campaign',
    'subject' => 'Welcome!',
]);

// Send a campaign
$client->campaigns()->send('campaign-uuid');

// Get campaign statistics
$stats = $client->campaigns()->statistics();

// Email templates
$templates = $client->campaigns()->listTemplates();
```

### Organizations

```php
// List organizations
$orgs = $client->organizations()->list();

// Manage users
$users = $client->organizations()->users('org-uuid');
$client->organizations()->addUser('org-uuid', [
    'email' => 'newuser@example.com',
    'role' => 'member',
]);

// Subscription
$subscription = $client->organizations()->subscription('org-uuid');
$client->organizations()->changePlan('org-uuid', [
    'plan_id' => 'pro',
]);
```

### WhatsApp

```php
// List accounts
$accounts = $client->whatsapp()->accounts();

// Phone numbers
$numbers = $client->whatsapp()->phoneNumbers('account-id');

// Templates
$templates = $client->whatsapp()->templates();
$client->whatsapp()->createTemplate([
    'name' => 'welcome_message',
    'language' => 'it',
    'category' => 'MARKETING',
]);

// Analytics
$analytics = $client->whatsapp()->analytics();
```

### Analytics

```php
// Chatbot analytics
$sentiment = $client->analytics()->sentimentOverview('chatbot-uuid', [
    'from' => '2025-01-01',
    'to' => '2025-12-31',
]);
$volume = $client->analytics()->messageVolume('chatbot-uuid');
$heatmap = $client->analytics()->activityHeatmap('chatbot-uuid');

// Channel analytics
$overview = $client->analytics()->channelsOverview();

// Campaign analytics
$campaignStats = $client->analytics()->campaignOverview();
```

### Dashboard

```php
$overview = $client->dashboard()->overview();
$activity = $client->dashboard()->recentActivity();
$metrics = $client->dashboard()->performanceMetrics();
```

### Settings

```php
// Profile
$profile = $client->settings()->profile();
$client->settings()->updateProfile(['name' => 'New Name']);

// API keys
$keys = $client->settings()->apiKeys();
$client->settings()->createApiKey(['name' => 'My API Key']);

// Email domain
$client->settings()->storeEmailDomain(['domain' => 'example.com']);
$client->settings()->verifyEmailDomain();
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
```

### Workspace

```php
// Folders
$folders = $client->workspace()->listFolders();

// Threads
$threads = $client->workspace()->listThreads();
$client->workspace()->createThread([
    'title' => 'New Thread',
]);
$client->workspace()->addThreadMessage('thread-uuid', [
    'content' => 'Hello!',
]);
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
