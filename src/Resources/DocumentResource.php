<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class DocumentResource extends Resource
{
    /**
     * Get all documents (including all versions).
     */
    public function list(): array
    {
        return $this->http->get('documents');
    }

    /**
     * Get latest documents (one per name).
     */
    public function latest(): array
    {
        return $this->http->get('documents/latest');
    }

    /**
     * Get pending documents for the authenticated user.
     */
    public function pending(): array
    {
        return $this->http->get('documents/pending');
    }

    /**
     * Accept a document.
     */
    public function accept(string $uuid): array
    {
        return $this->http->post("documents/{$uuid}/accept");
    }

    /**
     * Accept multiple documents at once.
     */
    public function acceptMultiple(array $data): array
    {
        return $this->http->post('documents/accept-multiple', $data);
    }
}
