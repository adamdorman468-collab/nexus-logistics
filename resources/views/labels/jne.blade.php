<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Label - {{ $shipment->tracking_number }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; margin: 0; padding: 12px; }
        .label { width: 700px; border: 1px solid #222; padding: 12px; }
        .box { border: 1px dashed #666; padding: 8px; margin-bottom: 8px; }
        .h1 { font-size: 18px; font-weight: 700; }
        .muted { color: #666; font-size: 12px; }
        .two { display:flex; gap:12px }
        .col { flex:1 }
        .barcode { font-size: 22px; letter-spacing: 4px; font-weight:700; }
    </style>
</head>
<body>
    <div class="label">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
                <div class="h1">JNE - Shipment Label (Demo)</div>
                <div class="muted">Professional enterprise-style label (generated locally)</div>
            </div>
            <div style="text-align:right">
                <div class="barcode">{{ $shipment->tracking_number }}</div>
                <div class="muted">{{ $shipment->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>

        <hr />

        <div class="two">
            <div class="col box">
                <strong>From</strong>
                <div>{{ $shipment->sender_name }}</div>
                <div class="muted">{{ $shipment->sender_phone }}</div>
            </div>
            <div class="col box">
                <strong>To</strong>
                <div>{{ $shipment->receiver_name }}</div>
                <div>{{ $shipment->receiver_address }}</div>
                <div class="muted">{{ $shipment->receiver_phone }}</div>
            </div>
        </div>

        <div class="two">
            <div class="col box">
                <strong>Service</strong>
                <div>Regular</div>
                <div class="muted">Weight: {{ $shipment->weight_kg }} kg</div>
            </div>
            <div class="col box">
                <strong>Info</strong>
                <div>Status: {{ $shipment->status_label }}</div>
                <div class="muted">Price: Rp {{ number_format($shipment->price, 0, ',', '.') }}</div>
            </div>
        </div>

        <div style="margin-top:10px; text-align:center;">
            <div class="muted">Scan / Print this label</div>
        </div>
    </div>
</body>
</html>
