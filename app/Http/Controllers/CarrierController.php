<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Services\LocalLabelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarrierController extends Controller
{
    protected LocalLabelService $labelService;

    public function __construct(LocalLabelService $labelService)
    {
        $this->labelService = $labelService;
    }

    /**
     * Create a shipment through the (stub) JNE service.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'nullable|string|max:50',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'nullable|string|max:50',
            'receiver_address' => 'required|string',
            'weight_kg' => 'nullable|numeric',
            'price' => 'nullable|numeric',
        ]);

        try {
            $result = $this->labelService->createShipment($data);
            return response()->json([
                'ok' => true,
                'tracking_number' => $result['tracking_number'],
                'shipment_id' => $result['shipment_id'],
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Carrier create failed: ' . $e->getMessage());
            return response()->json(['ok' => false, 'message' => 'Failed to create shipment'], 500);
        }
    }

    /**
     * Download or view label for a shipment.
     * If `?pdf=1` is present and `barryvdh/laravel-dompdf` is installed, it will return a PDF.
     */
    public function downloadLabel(Request $request, string $tracking)
    {
        $shipment = Shipment::where('tracking_number', $tracking)->first();
        if (! $shipment) {
            return abort(404, 'Shipment not found');
        }

        // If user requested PDF and Dompdf is available
        if ($request->query('pdf')) {
            if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('labels.jne', compact('shipment'));
                return $pdf->download($shipment->tracking_number . '-label.pdf');
            }
            // If Dompdf not installed, fall back to HTML with note
            return response($this->labelService->renderLabelHtml($shipment))->header('Content-Type', 'text/html');
        }

        // Default: return the HTML view so users can print to PDF from browser
        return view('labels.jne', compact('shipment'));
    }
}
