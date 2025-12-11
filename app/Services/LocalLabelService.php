<?php

namespace App\Services;

use App\Models\Shipment;

/**
 * LocalLabelService — a local simulator for creating shipments and rendering labels.
 * This is intentionally a local simulator and has NO relation to any carrier API.
 * Use this service to generate tracking numbers, persist shipments and produce
 * printable label HTML/PDF from your application's CRUD data.
 */
class LocalLabelService
{
    /**
     * Create a shipment record and return meta including tracking number.
     * This is a local simulator only.
     *
     * @param array $data
     * @return array
     */
    public function createShipment(array $data): array
    {
        $payload = array_merge([
            'sender_name' => $data['sender_name'] ?? 'Unknown Sender',
            'sender_phone' => $data['sender_phone'] ?? null,
            'receiver_name' => $data['receiver_name'] ?? 'Unknown Receiver',
            'receiver_phone' => $data['receiver_phone'] ?? null,
            'receiver_address' => $data['receiver_address'] ?? null,
            'weight_kg' => $data['weight_kg'] ?? 0.5,
            'price' => $data['price'] ?? 0.0,
            'status' => $data['status'] ?? 'pending',
        ], $data);

        // Create a deterministic, readable tracking number for demo/admin use
        $tracking = 'NXS' . now()->format('YmdHis') . sprintf('%04d', random_int(0, 9999));

        $shipment = Shipment::create(array_merge($payload, [
            'tracking_number' => $tracking,
        ]));

        // initial status update
        $shipment->updates()->create([
            'location' => 'Local Warehouse',
            'description' => 'Created via LocalLabelService simulator',
            'status' => $payload['status'] ?? 'pending',
            'happened_at' => now(),
        ]);

        return [
            'tracking_number' => $tracking,
            'shipment_id' => $shipment->id,
        ];
    }

    /**
     * Render label HTML for a shipment (used by view or PDF generator).
     *
     * @param Shipment $shipment
     * @return string
     */
    public function renderLabelHtml(Shipment $shipment): string
    {
        return view('labels.jne', compact('shipment'))->render();
    }
}
