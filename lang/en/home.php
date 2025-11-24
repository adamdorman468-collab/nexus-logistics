<?php

return [
    'lang_switch' => [
        'label' => 'Language',
        'id' => 'Bahasa Indonesia',
        'en' => 'English',
    ],
    'hero' => [
        'tagline' => 'Real-time Shipment Intelligence',
        'title' => 'Monitor parcels, reduce downtime, and earn customer trust.',
        'subtitle' => 'Nexus Logistics delivers end-to-end tracking, operational dashboards, and actionable logistics insights for modern fulfillment teams.',
        'bullets' => [
            'infra' => '24/7 Infrastructure',
            'sla' => 'Updates < 5 minutes',
            'api' => 'Ready-to-use API integration',
        ],
        'form_title' => 'Customer Portal',
        'form_subtitle' => 'Track Shipment',
        'form_label' => 'Tracking Number',
        'form_placeholder' => 'Example: NXS-9Z1PK3',
        'form_button' => 'Track',
        'form_consent' => 'By clicking “Track”, you agree to the Nexus Logistics terms of use.',
        'internal_access' => 'Internal Access',
        'admin_login' => 'Admin Dashboard Login',
        'live_badge' => 'Live',
    ],
    'cards' => [
        'total' => [
            'title' => 'Total Shipments',
            'desc' => 'Stored over the last 12 months',
        ],
        'delivered' => [
            'title' => 'Delivered Successfully',
            'desc' => 'Success rate',
        ],
        'in_transit' => [
            'title' => 'In Transit',
            'desc' => 'Monitored live by couriers',
        ],
        'pending' => [
            'title' => 'Awaiting Pickup',
            'desc' => 'Requires dispatch action',
        ],
    ],
    'pillars' => [
        [
            'tag' => 'Visibility',
            'title' => 'Realtime Timeline',
            'body' => 'Every courier update syncs instantly with the customer, complete with location and condition notes.',
        ],
        [
            'tag' => 'Automation',
            'title' => 'Proactive Notifications',
            'body' => 'Webhook & email integrations ensure customers are alerted whenever statuses change.',
        ],
        [
            'tag' => 'Analytics',
            'title' => 'Operational Insight',
            'body' => 'The admin dashboard highlights key KPIs like SLA, route bottlenecks, and courier performance.',
        ],
    ],
    'process' => [
        'tag' => 'Operational Flow',
        'title' => 'How the system works',
        'steps' => [
            [
                'title' => 'Order Intake',
                'body' => 'Sender and receiver data recorded via the Filament dashboard.',
            ],
            [
                'title' => 'Courier Status Updates',
                'body' => 'Couriers submit location, notes, and proof of delivery when needed.',
            ],
            [
                'title' => 'Client Visibility',
                'body' => 'Customers share a live timeline that can be embedded or exported.',
            ],
        ],
    ],
    'activity' => [
        'title' => 'Latest Activity',
        'sample_label' => 'Sample Data',
        'empty' => 'No shipments yet. Create the first order via the admin dashboard.',
    ],
    'footer' => [
        'copy' => '© :year Nexus Logistics System. Built with Laravel 12 & Filament 4.',
        'tags' => [
            'Data Security',
            'API Integration',
            '24/7 Monitoring',
        ],
    ],
];

