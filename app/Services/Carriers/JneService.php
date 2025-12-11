<?php

namespace App\Services\Carriers;

use App\Services\LocalLabelService;

/**
 * Deprecated JneService shim.
 *
 * This class remains for backward compatibility only and forwards to the
 * `App\Services\LocalLabelService` simulator. Do not use this class in
 * new code — prefer `App\Services\LocalLabelService` which is explicit
 * about being a local simulator with NO external carrier API calls.
 */
class JneService
{
    protected LocalLabelService $service;

    public function __construct()
    {
        $this->service = new LocalLabelService();
    }

    public function createShipment(array $data): array
    {
        @trigger_error('JneService is deprecated. Use App\\Services\\LocalLabelService instead.', E_USER_DEPRECATED);
        return $this->service->createShipment($data);
    }

    public function renderLabelHtml($shipment): string
    {
        @trigger_error('JneService is deprecated. Use App\\Services\\LocalLabelService instead.', E_USER_DEPRECATED);
        return $this->service->renderLabelHtml($shipment);
    }
}
