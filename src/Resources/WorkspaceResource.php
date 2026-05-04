<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class WorkspaceResource extends Resource
{
    // --- Folders ---

    /**
     * List all workspace folders.
     */
    public function listFolders(): array
    {
        return $this->http->get('workspace/folders');
    }

    /**
     * Create a new workspace folder.
     */
    public function createFolder(array $data): array
    {
        return $this->http->post('workspace/folders', $data);
    }

    /**
     * Show a workspace folder with its threads.
     */
    public function getFolder(string $uuid): array
    {
        return $this->http->get("workspace/folders/{$uuid}");
    }

    /**
     * Update a workspace folder.
     */
    public function updateFolder(string $uuid, array $data): array
    {
        return $this->http->put("workspace/folders/{$uuid}", $data);
    }

    /**
     * Delete a workspace folder.
     */
    public function deleteFolder(string $uuid): array
    {
        return $this->http->delete("workspace/folders/{$uuid}");
    }

    // --- Folder Files ---

    /**
     * List files in a workspace folder.
     */
    public function listFiles(string $folderUuid, array $query = []): array
    {
        return $this->http->get("workspace/folders/{$folderUuid}/files", $query);
    }

    /**
     * Upload a file to a workspace folder.
     */
    public function uploadFile(string $folderUuid, string $filePath, array $data = []): array
    {
        return $this->http->upload("workspace/folders/{$folderUuid}/files", $filePath, 'file', $data);
    }

    /**
     * Get a specific file's details.
     */
    public function getFile(string $folderUuid, string $fileUuid): array
    {
        return $this->http->get("workspace/folders/{$folderUuid}/files/{$fileUuid}");
    }

    /**
     * Delete a file.
     */
    public function deleteFile(string $folderUuid, string $fileUuid): array
    {
        return $this->http->delete("workspace/folders/{$folderUuid}/files/{$fileUuid}");
    }

    // --- Threads ---

    /**
     * List all workspace threads.
     */
    public function listThreads(array $query = []): array
    {
        return $this->http->get('workspace/threads', $query);
    }

    /**
     * Create a new workspace thread.
     */
    public function createThread(array $data): array
    {
        return $this->http->post('workspace/threads', $data);
    }

    /**
     * Get a workspace thread with messages.
     */
    public function getThread(string $uuid): array
    {
        return $this->http->get("workspace/threads/{$uuid}");
    }

    /**
     * Update a workspace thread.
     */
    public function updateThread(string $uuid, array $data): array
    {
        return $this->http->put("workspace/threads/{$uuid}", $data);
    }

    /**
     * Delete a workspace thread.
     */
    public function deleteThread(string $uuid): array
    {
        return $this->http->delete("workspace/threads/{$uuid}");
    }

    /**
     * Close a workspace thread.
     */
    public function closeThread(string $uuid): array
    {
        return $this->http->post("workspace/threads/{$uuid}/close");
    }

    /**
     * Reopen a workspace thread.
     */
    public function reopenThread(string $uuid): array
    {
        return $this->http->post("workspace/threads/{$uuid}/reopen");
    }

    /**
     * Get messages for a workspace thread.
     */
    public function threadMessages(string $uuid, array $query = []): array
    {
        return $this->http->get("workspace/threads/{$uuid}/messages", $query);
    }

    /**
     * Add a message to a workspace thread.
     */
    public function addThreadMessage(string $uuid, array $data): array
    {
        return $this->http->post("workspace/threads/{$uuid}/messages", $data);
    }

    /**
     * Get a single message by UUID.
     */
    public function getThreadMessage(string $threadUuid, string $messageUuid): array
    {
        return $this->http->get("workspace/threads/{$threadUuid}/messages/{$messageUuid}");
    }

    /**
     * Stop a streaming message.
     */
    public function stopMessage(string $threadUuid, string $messageUuid): array
    {
        return $this->http->post("workspace/threads/{$threadUuid}/messages/{$messageUuid}/stop");
    }

    // --- Thread Participants ---

    /**
     * List participants of a thread.
     */
    public function listParticipants(string $threadUuid): array
    {
        return $this->http->get("workspace/threads/{$threadUuid}/participants");
    }

    /**
     * Add participants to thread.
     */
    public function addParticipants(string $threadUuid, array $data): array
    {
        return $this->http->post("workspace/threads/{$threadUuid}/participants", $data);
    }

    /**
     * Remove participant from thread.
     */
    public function removeParticipant(string $threadUuid, string $userUuid): array
    {
        return $this->http->delete("workspace/threads/{$threadUuid}/participants/{$userUuid}");
    }

    // --- Skills ---

    /**
     * List workspace skills.
     */
    public function listSkills(): array
    {
        return $this->http->get('workspace/skills');
    }

    /**
     * Toggle a skill's enabled status.
     */
    public function toggleSkill(string $uuid): array
    {
        return $this->http->patch("workspace/skills/{$uuid}/toggle");
    }

    /**
     * Update skill settings.
     */
    public function updateSkillSettings(string $uuid, array $data): array
    {
        return $this->http->patch("workspace/skills/{$uuid}/settings", $data);
    }

    /**
     * Get brand guidelines.
     */
    public function brandGuidelines(): array
    {
        return $this->http->get('workspace/skills/brand-guidelines');
    }

    /**
     * Save brand guidelines.
     */
    public function saveBrandGuidelines(array $data): array
    {
        return $this->http->post('workspace/skills/brand-guidelines', $data);
    }
}
