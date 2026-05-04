<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class AffiliateResource extends Resource
{
    /**
     * Get affiliate dashboard data.
     */
    public function dashboard(): array
    {
        return $this->http->get('affiliate/dashboard');
    }

    /**
     * Get affiliate company data.
     */
    public function companyData(): array
    {
        return $this->http->get('affiliate/company-data');
    }

    /**
     * Update affiliate company data.
     */
    public function updateCompanyData(array $data): array
    {
        return $this->http->put('affiliate/company-data', $data);
    }

    /**
     * Get monthly affiliate earnings.
     */
    public function monthlyEarnings(): array
    {
        return $this->http->get('affiliate/monthly-earnings');
    }

    /**
     * Upload an invoice for monthly earnings.
     */
    public function uploadInvoice(string $uuid, string $filePath): array
    {
        return $this->http->upload("affiliate/monthly-earnings/{$uuid}/invoice", $filePath, 'invoice');
    }

    /**
     * Download an invoice file.
     */
    public function downloadInvoice(string $uuid): array
    {
        return $this->http->get("affiliate/monthly-earnings/{$uuid}/invoice");
    }
}
