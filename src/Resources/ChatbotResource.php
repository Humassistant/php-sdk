<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class ChatbotResource extends Resource
{
    /**
     * Get all chatbots.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('chatbots', $query);
    }

    /**
     * Create a new chatbot.
     */
    public function create(array $data): array
    {
        return $this->http->post('chatbots', $data);
    }

    /**
     * Get chatbot by UUID.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}");
    }

    /**
     * Update chatbot.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}", $data);
    }

    /**
     * Delete chatbot.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("chatbots/{$uuid}");
    }

    /**
     * Get chatbots analytics.
     */
    public function analytics(array $query = []): array
    {
        return $this->http->get('chatbots/analytics', $query);
    }

    /**
     * Get analytics for a specific chatbot.
     */
    public function chatbotAnalytics(string $uuid, array $query = []): array
    {
        return $this->http->get("chatbots/{$uuid}/analytics", $query);
    }

    /**
     * Get available operators for a chatbot.
     */
    public function availableOperators(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/available-operators");
    }

    /**
     * Initiate WhatsApp conversation with template message.
     */
    public function initiateWhatsapp(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/whatsapp/initiate", $data);
    }

    /**
     * Generate structured instructions from natural language using AI.
     */
    public function generateInstructions(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/generate-instructions", $data);
    }

    /**
     * Import website content.
     */
    public function importWebsite(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/import-website", $data);
    }

    /**
     * Start website import.
     */
    public function importWebsiteStart(string $uuid, string $importId): array
    {
        return $this->http->post("chatbots/{$uuid}/import-website-start/{$importId}");
    }

    /**
     * Get website import status.
     */
    public function importWebsiteStatus(string $uuid, string $importId): array
    {
        return $this->http->get("chatbots/{$uuid}/import-website-status/{$importId}");
    }

    /**
     * Erase all content for a chatbot.
     */
    public function eraseContent(string $uuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/erase-content");
    }

    /**
     * Update chatbot response accuracy.
     */
    public function updateAccuracy(string $uuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/accuracy", $data);
    }

    /**
     * Update chatbot selected avatar.
     */
    public function updateSelectedAvatar(string $uuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/selected-avatar", $data);
    }

    /**
     * Update chatbot voice call settings.
     */
    public function updateVoiceCallSettings(string $uuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/voice-call-settings", $data);
    }

    /**
     * Test Twilio configuration for a chatbot.
     */
    public function testTwilioConfig(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/test-twilio-config", $data);
    }

    /**
     * Get voice call analytics for a chatbot.
     */
    public function voiceCallAnalytics(string $uuid, array $query = []): array
    {
        return $this->http->get("chatbots/{$uuid}/voice-call-analytics", $query);
    }

    // --- Contents ---

    /**
     * Get contents for a chatbot.
     */
    public function listContents(string $uuid, array $query = []): array
    {
        return $this->http->get("chatbots/{$uuid}/contents", $query);
    }

    /**
     * Create content for a chatbot.
     */
    public function createContent(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/contents", $data);
    }

    /**
     * Update content for a chatbot.
     */
    public function updateContent(string $uuid, string $contentUuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/contents/{$contentUuid}", $data);
    }

    /**
     * Delete content for a chatbot.
     */
    public function deleteContent(string $uuid, string $contentUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/contents/{$contentUuid}");
    }

    // --- Avatars ---

    /**
     * Get all avatars for a chatbot.
     */
    public function listAvatars(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/avatars");
    }

    /**
     * Create a new avatar for a chatbot.
     */
    public function createAvatar(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/avatars", $data);
    }

    /**
     * Update an avatar for a chatbot.
     */
    public function updateAvatar(string $uuid, string $avatarUuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/avatars/{$avatarUuid}", $data);
    }

    /**
     * Delete an avatar from a chatbot.
     */
    public function deleteAvatar(string $uuid, string $avatarUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/avatars/{$avatarUuid}");
    }

    // --- Voices ---

    /**
     * Get all voices for a chatbot.
     */
    public function listVoices(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/voices");
    }

    /**
     * Create a new voice for a chatbot.
     */
    public function createVoice(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/voices", $data);
    }

    /**
     * Update a voice for a chatbot.
     */
    public function updateVoice(string $uuid, string $voiceUuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/voices/{$voiceUuid}", $data);
    }

    /**
     * Delete a voice from a chatbot.
     */
    public function deleteVoice(string $uuid, string $voiceUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/voices/{$voiceUuid}");
    }

    /**
     * Test a voice with sample text.
     */
    public function testVoice(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/voices/test", $data);
    }

    // --- Tool Functions ---

    /**
     * Get all tool functions for a chatbot.
     */
    public function listToolFunctions(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/tool-functions");
    }

    /**
     * Create a new tool function for a chatbot.
     */
    public function createToolFunction(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/tool-functions", $data);
    }

    /**
     * Update a tool function for a chatbot.
     */
    public function updateToolFunction(string $uuid, string $functionUuid, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/tool-functions/{$functionUuid}", $data);
    }

    /**
     * Delete a tool function from a chatbot.
     */
    public function deleteToolFunction(string $uuid, string $functionUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/tool-functions/{$functionUuid}");
    }

    /**
     * Test a tool function.
     */
    public function testToolFunction(string $uuid, string $functionUuid): array
    {
        return $this->http->post("chatbots/{$uuid}/test-tool-function/{$functionUuid}");
    }

    // --- Assistant Actions ---

    /**
     * List all available assistant actions for a chatbot.
     */
    public function listAssistantActions(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/assistant-actions");
    }

    /**
     * Activate an assistant action on a chatbot.
     */
    public function activateAssistantAction(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/assistant-actions/activate", $data);
    }

    /**
     * Deactivate an assistant action.
     */
    public function deactivateAssistantAction(string $uuid, string $toolFunctionUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/assistant-actions/{$toolFunctionUuid}");
    }

    // --- Integration Actions ---

    /**
     * List active integration tool functions for a chatbot.
     */
    public function listIntegrationActions(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/integration-actions");
    }

    /**
     * Activate an integration action on a chatbot.
     */
    public function activateIntegrationAction(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/integration-actions/activate", $data);
    }

    /**
     * Deactivate an integration action.
     */
    public function deactivateIntegrationAction(string $uuid, string $toolFunctionUuid): array
    {
        return $this->http->delete("chatbots/{$uuid}/integration-actions/{$toolFunctionUuid}");
    }

    // --- Emails ---

    /**
     * List all email accounts for a chatbot.
     */
    public function listEmails(string $uuid): array
    {
        return $this->http->get("chatbots/{$uuid}/emails");
    }

    /**
     * Create a new email account for a chatbot.
     */
    public function createEmail(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/emails", $data);
    }

    /**
     * Get a specific email account.
     */
    public function getEmail(string $uuid, string $emailId): array
    {
        return $this->http->get("chatbots/{$uuid}/emails/{$emailId}");
    }

    /**
     * Update an email account.
     */
    public function updateEmail(string $uuid, string $emailId, array $data): array
    {
        return $this->http->put("chatbots/{$uuid}/emails/{$emailId}", $data);
    }

    /**
     * Delete an email account.
     */
    public function deleteEmail(string $uuid, string $emailId): array
    {
        return $this->http->delete("chatbots/{$uuid}/emails/{$emailId}");
    }

    /**
     * Test email connection.
     */
    public function testEmailConnection(string $uuid, array $data): array
    {
        return $this->http->post("chatbots/{$uuid}/emails/test", $data);
    }
}
