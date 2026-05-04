<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class AnalyticsResource extends Resource
{
    // --- Chatbot Analytics ---

    public function userMessageClusters(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/user-message-clusters", $query);
    }

    public function sentimentOverview(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/sentiment/overview", $query);
    }

    public function sentimentTimeline(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/sentiment/timeline", $query);
    }

    public function topPositiveMessages(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/sentiment/top-positive", $query);
    }

    public function topNegativeMessages(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/sentiment/top-negative", $query);
    }

    public function messageVolume(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/message-volume", $query);
    }

    public function responseTimes(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/response-times", $query);
    }

    public function messageStats(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/message-stats", $query);
    }

    public function activityHeatmap(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/activity-heatmap", $query);
    }

    public function threadSources(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/thread-sources", $query);
    }

    public function threadDuration(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/thread-duration", $query);
    }

    public function threadLifecycle(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/thread-lifecycle", $query);
    }

    public function operatorTransfers(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/operator-transfers", $query);
    }

    public function threadClosure(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/thread-closure", $query);
    }

    public function utmAttribution(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/utm-attribution", $query);
    }

    public function performanceOverview(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/performance-overview", $query);
    }

    public function approvalMetrics(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/approval-metrics", $query);
    }

    public function roleDistribution(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/role-distribution", $query);
    }

    public function customerStats(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/customer-stats", $query);
    }

    public function topCustomers(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/top-customers", $query);
    }

    public function customerRetention(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/customer-retention", $query);
    }

    public function contentUsage(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/content-usage", $query);
    }

    public function contentGaps(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/content-gaps", $query);
    }

    public function peakTimes(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/peak-times", $query);
    }

    public function trends(string $chatbotUuid, array $query = []): array
    {
        return $this->http->get("analytics/chatbots/{$chatbotUuid}/trends", $query);
    }

    // --- Channel Analytics ---

    public function channelsOverview(array $query = []): array
    {
        return $this->http->get('analytics/channels/overview', $query);
    }

    public function channelInstances(string $channelType, array $query = []): array
    {
        return $this->http->get("analytics/channels/{$channelType}/instances", $query);
    }

    public function channelResponseTime(array $query = []): array
    {
        return $this->http->get('analytics/channels/response-time', $query);
    }

    public function channelMessageStats(array $query = []): array
    {
        return $this->http->get('analytics/channels/message-stats', $query);
    }

    public function channelActivityHeatmap(array $query = []): array
    {
        return $this->http->get('analytics/channels/activity-heatmap', $query);
    }

    public function channelMessageClusters(array $query = []): array
    {
        return $this->http->get('analytics/channels/message-clusters', $query);
    }

    public function channelMessageVolume(array $query = []): array
    {
        return $this->http->get('analytics/channels/message-volume', $query);
    }

    // --- Campaign Analytics ---

    public function campaignOverview(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/overview', $query);
    }

    public function campaignTimeline(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/timeline', $query);
    }

    public function campaignTop(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/top', $query);
    }

    public function campaignChannelComparison(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/channel-comparison', $query);
    }

    public function campaignSendStatus(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/send-status', $query);
    }

    public function campaignBounceTrends(array $query = []): array
    {
        return $this->http->get('analytics/campaigns/bounce-trends', $query);
    }
}
