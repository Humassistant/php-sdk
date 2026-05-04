<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class ThreadResource extends Resource
{
    /**
     * Get all threads with filtering and pagination.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('threads', $query);
    }

    /**
     * Create a new thread.
     */
    public function create(array $data): array
    {
        return $this->http->post('threads', $data);
    }

    /**
     * Get thread by UUID with all messages.
     */
    public function get(string $uuid): array
    {
        return $this->http->get("threads/{$uuid}");
    }

    /**
     * Update thread.
     */
    public function update(string $uuid, array $data): array
    {
        return $this->http->put("threads/{$uuid}", $data);
    }

    /**
     * Delete a thread permanently.
     */
    public function delete(string $uuid): array
    {
        return $this->http->delete("threads/{$uuid}");
    }

    /**
     * Get thread analytics.
     */
    public function analytics(array $query = []): array
    {
        return $this->http->get('threads/analytics', $query);
    }

    /**
     * Close a thread.
     */
    public function close(string $uuid, array $data = []): array
    {
        return $this->http->post("threads/{$uuid}/close", $data);
    }

    /**
     * Reopen a closed thread.
     */
    public function reopen(string $uuid): array
    {
        return $this->http->post("threads/{$uuid}/reopen");
    }

    /**
     * Escalate thread to human operator.
     */
    public function escalate(string $uuid, array $data = []): array
    {
        return $this->http->post("threads/{$uuid}/escalate", $data);
    }

    /**
     * Release control from operator back to AI.
     */
    public function releaseControl(string $uuid, array $data = []): array
    {
        return $this->http->post("threads/{$uuid}/release-control", $data);
    }

    /**
     * Get thread messages.
     */
    public function messages(string $uuid, array $query = []): array
    {
        return $this->http->get("threads/{$uuid}/messages", $query);
    }

    /**
     * Add message to thread.
     */
    public function addMessage(string $uuid, array $data): array
    {
        return $this->http->post("threads/{$uuid}/messages", $data);
    }

    /**
     * Get a single message by UUID.
     */
    public function getMessage(string $uuid, string $messageUuid): array
    {
        return $this->http->get("threads/{$uuid}/messages/{$messageUuid}");
    }

    /**
     * Add message correction to thread.
     */
    public function addMessageCorrection(string $uuid, string $messageUuid, array $data): array
    {
        return $this->http->post("threads/{$uuid}/messages/{$messageUuid}/correction", $data);
    }

    /**
     * Send WhatsApp message.
     */
    public function messageSendWhatsapp(string $uuid, string $messageUuid, array $data = []): array
    {
        return $this->http->post("threads/{$uuid}/messages/{$messageUuid}/send-whatsapp", $data);
    }

    /**
     * List approved WhatsApp templates for this thread.
     */
    public function whatsappTemplates(string $uuid): array
    {
        return $this->http->get("threads/{$uuid}/whatsapp-templates");
    }

    /**
     * Send a WhatsApp template message from an operator.
     */
    public function sendWhatsappTemplate(string $uuid, array $data): array
    {
        return $this->http->post("threads/{$uuid}/send-whatsapp-template", $data);
    }

    // --- Actions ---

    /**
     * Move a thread to trash.
     */
    public function trash(string $uuid): array
    {
        return $this->http->post("threads/{$uuid}/trash");
    }

    /**
     * Mark a thread as spam.
     */
    public function spam(string $uuid): array
    {
        return $this->http->post("threads/{$uuid}/spam");
    }

    /**
     * Restore a thread from trash or spam.
     */
    public function restore(string $uuid): array
    {
        return $this->http->post("threads/{$uuid}/restore");
    }

    // --- Favorites ---

    /**
     * Add a thread to favorites.
     */
    public function favorite(string $uuid): array
    {
        return $this->http->post("threads/{$uuid}/favorite");
    }

    /**
     * Remove a thread from favorites.
     */
    public function unfavorite(string $uuid): array
    {
        return $this->http->delete("threads/{$uuid}/favorite");
    }

    // --- Folders ---

    /**
     * List all folders.
     */
    public function listFolders(): array
    {
        return $this->http->get('threads/folders');
    }

    /**
     * Create a new folder.
     */
    public function createFolder(array $data): array
    {
        return $this->http->post('threads/folders', $data);
    }

    /**
     * Update a folder.
     */
    public function updateFolder(string $uuid, array $data): array
    {
        return $this->http->put("threads/folders/{$uuid}", $data);
    }

    /**
     * Delete a folder.
     */
    public function deleteFolder(string $uuid): array
    {
        return $this->http->delete("threads/folders/{$uuid}");
    }

    /**
     * Assign a thread to a folder.
     */
    public function assignFolder(string $threadUuid, array $data): array
    {
        return $this->http->post("threads/{$threadUuid}/folder", $data);
    }

    /**
     * Remove a thread from its folder.
     */
    public function unassignFolder(string $threadUuid): array
    {
        return $this->http->delete("threads/{$threadUuid}/folder");
    }
}
