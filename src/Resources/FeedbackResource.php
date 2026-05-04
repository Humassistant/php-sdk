<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class FeedbackResource extends Resource
{
    /**
     * Get all feedbacks with filtering and pagination.
     */
    public function list(array $query = []): array
    {
        return $this->http->get('feedbacks', $query);
    }

    /**
     * Create a new feedback.
     */
    public function create(array $data): array
    {
        return $this->http->post('feedbacks', $data);
    }
}
