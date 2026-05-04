<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class DashboardResource extends Resource
{
    /**
     * Get dashboard overview statistics.
     */
    public function overview(array $query = []): array
    {
        return $this->http->get('dashboard/overview', $query);
    }

    /**
     * Get conversation analytics.
     */
    public function conversationAnalytics(array $query = []): array
    {
        return $this->http->get('dashboard/conversation-analytics', $query);
    }

    /**
     * Get recent activity feed.
     */
    public function recentActivity(array $query = []): array
    {
        return $this->http->get('dashboard/recent-activity', $query);
    }

    /**
     * Get performance metrics.
     */
    public function performanceMetrics(array $query = []): array
    {
        return $this->http->get('dashboard/performance-metrics', $query);
    }
}
