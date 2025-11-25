<?php

return [
    'lang_switch' => [
        'label' => 'Bahasa',
        'id' => 'Bahasa Indonesia',
        'en' => 'English',
    ],
    'hero' => [
        'tagline' => 'Inteligensi Pengiriman Real-time',
        'title' => 'Pantau paket, kurangi downtime, dan tingkatkan kepercayaan pelanggan.',
        'subtitle' => 'Nexus Logistics menghadirkan pelacakan ujung-ke-ujung, dashboard operasional, dan insight logistik untuk tim fulfillment modern di seluruh Indonesia.',
        'bullets' => [
            'infra' => 'Infrastruktur 24/7',
            'sla' => 'SLA update < 5 menit',
            'api' => 'Integrasi API siap pakai',
        ],
        'form_title' => 'Portal Pelanggan',
        'form_subtitle' => 'Lacak Resi',
        'form_label' => 'Nomor Resi',
        'form_placeholder' => 'Contoh: NXS-9Z1PK3',
        'form_button' => 'Lacak',
        'form_consent' => 'Dengan mengeklik “Lacak”, Anda menyetujui syarat penggunaan Nexus Logistics.',
        'internal_access' => 'Akses Internal',
        'admin_login' => 'Login Dashboard Admin',
        'live_badge' => 'Live',
    ],
    'cards' => [
        'total' => [
            'title' => 'Total Pengiriman',
            'desc' => 'Tersimpan pada 12 bulan terakhir',
        ],
        'delivered' => [
            'title' => 'Berhasil Terkirim',
            'desc' => 'Persentase kesuksesan',
        ],
        'in_transit' => [
            'title' => 'Sedang Dalam Perjalanan',
            'desc' => 'Dipantau langsung kurir',
        ],
        'pending' => [
            'title' => 'Menunggu Penjemputan',
            'desc' => 'Butuh tindakan dispatch',
        ],
    ],
    'pillars' => [
        [
            'tag' => 'Visibility',
            'title' => 'Timeline Real-time',
            'body' => 'Setiap update kurir langsung tersinkron dengan pelanggan lengkap dengan lokasi dan catatan kondisi.',
        ],
        [
            'tag' => 'Automation',
            'title' => 'Notifikasi Proaktif',
            'body' => 'Integrasi webhook & email memastikan pelanggan menerima pemberitahuan saat status berubah.',
        ],
        [
            'tag' => 'Analytics',
            'title' => 'Insight Operasional',
            'body' => 'Dashboard admin menampilkan KPI seperti SLA, bottleneck rute, dan performa kurir.',
        ],
    ],
    'process' => [
        'tag' => 'Alur Operasional',
        'title' => 'Bagaimana sistem bekerja',
        'steps' => [
            [
                'title' => 'Input Order',
                'body' => 'Data pengirim, penerima, dan ongkir dicatat melalui dashboard Filament.',
            ],
            [
                'title' => 'Kurir Update Status',
                'body' => 'Kurir menambahkan lokasi, catatan, dan bukti serah ketika diperlukan.',
            ],
            [
                'title' => 'Klien Memantau',
                'body' => 'Portal pelanggan menampilkan timeline hidup yang bisa dibagikan.',
            ],
        ],
    ],
    'activity' => [
        'title' => 'Aktivitas Terakhir',
        'sample_label' => 'Sample Data',
        'empty' => 'Belum ada data pengiriman. Input pesanan pertama melalui dashboard admin.',
    ],
    'footer' => [
        'copy' => '© :year Nexus Logistics System. Dibangun dengan Laravel 12 & Filament 4.',
        'tags' => [
            'Keamanan Data',
            'Integrasi API',
            'Monitoring 24/7',
        ],
    ],
];

