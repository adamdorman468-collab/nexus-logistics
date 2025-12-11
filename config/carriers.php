<?php

return [
    // Local simulator settings — this application uses a local label simulator
    // (no external carrier API calls). Set 'enabled' to false to disable simulator.
    'simulator' => [
        'enabled' => env('CARRIER_SIMULATOR_ENABLED', true),
        'provider' => env('CARRIER_SIMULATOR_PROVIDER', 'local_label_service'),
    ],

    // Legacy carrier keys are kept here for reference only. This project
    // intentionally does NOT call external carrier APIs by default.
    'jne' => [
        'deprecated' => true,
        'note' => 'This section is informational only; the app uses the local simulator.',
        'api_key' => env('JNE_API_KEY', ''),
        'api_secret' => env('JNE_API_SECRET', ''),
        'endpoint' => env('JNE_API_ENDPOINT', ''),
    ],
];
