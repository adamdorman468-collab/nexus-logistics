<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Lacak {{ $shipment->tracking_number }} - Nexus Logistics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .timeline-line { position: absolute; left: 15px; top: 10px; bottom: 0; width: 2px; background: #e2e8f0; z-index: 0; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800">

    <nav class="bg-slate-900 text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="max-w-3xl mx-auto flex flex-wrap gap-3 justify-between items-center">
            <div class="font-bold text-xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">
                Nexus Logistics
            </div>
            <div class="flex items-center gap-3 text-xs uppercase tracking-[0.3em] text-slate-400">
                <span>{{ __('tracking.lang_switch') }}</span>
                <div class="flex gap-2 font-semibold tracking-normal">
                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'id']) }}"
                       class="{{ app()->getLocale() === 'id' ? 'text-white' : 'text-slate-500 hover:text-white' }}">ID</a>
                    <span class="opacity-40">/</span>
                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}"
                       class="{{ app()->getLocale() === 'en' ? 'text-white' : 'text-slate-500 hover:text-white' }}">EN</a>
                </div>
            </div>
            <a href="/" class="text-sm text-slate-300 hover:text-white transition flex items-center gap-1">
                &larr; {{ __('tracking.nav_back') }}
            </a>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto p-4 mt-6 pb-20">
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-6">
            <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('home.hero.form_label') }}</span>
                    <h1 class="text-3xl font-black text-slate-800 tracking-tight">{{ $shipment->tracking_number }}</h1>
                </div>
                @php
                    $statusColors = [
                        'pending' => 'bg-gray-100 text-gray-600',
                        'picked_up' => 'bg-blue-100 text-blue-700',
                        'in_transit' => 'bg-amber-100 text-amber-700',
                        'delivered' => 'bg-green-100 text-green-700',
                        'returned' => 'bg-red-100 text-red-700',
                    ];
                    $colorClass = $statusColors[$shipment->status] ?? 'bg-gray-100 text-gray-600';
                @endphp
                <span class="px-4 py-2 rounded-full font-bold text-sm uppercase {{ $colorClass }}">
                    {{ $shipment->status_label }}
                </span>
            </div>

            <div class="p-6 bg-slate-50/50 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative pl-4 border-l-4 border-slate-300">
                    <p class="text-xs font-bold text-slate-400 uppercase mb-1">{{ __('tracking.sender') }}</p>
                    <p class="font-bold text-slate-700 text-lg">{{ $shipment->sender_name }}</p>
                    <p class="text-sm text-slate-500">{{ $shipment->sender_phone }}</p>
                </div>
                
                <div class="relative pl-4 border-l-4 border-blue-500">
                    <p class="text-xs font-bold text-slate-400 uppercase mb-1">{{ __('tracking.receiver') }}</p>
                    <p class="font-bold text-slate-700 text-lg">{{ $shipment->receiver_name }}</p>
                    <p class="text-sm text-slate-500">{{ $shipment->receiver_phone }}</p>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">{{ $shipment->receiver_address }}</p>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-slate-100 border-t border-slate-200 flex gap-6 text-sm text-slate-600 flex-wrap">
                <div>
                    <span class="font-bold">{{ __('tracking.weight') }}:</span>
                    {{ filled($shipment->weight_kg) ? rtrim(rtrim(number_format($shipment->weight_kg, 2, ',', '.'), '0'), ',') . ' kg' : '-' }}
                </div>
                <div>
                    <span class="font-bold">{{ __('tracking.price') }}:</span>
                    {{ filled($shipment->price) ? 'Rp ' . number_format($shipment->price, 0, ',', '.') : '-' }}
                </div>
            </div>
        </div>

        <h3 class="font-bold text-xl text-slate-800 mb-4 px-2">{{ __('tracking.history_title') }}</h3>
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
            <div class="relative">
                <div class="timeline-line"></div>

                <div class="space-y-8 relative z-10">
                    @forelse($shipment->updates as $index => $update)
                        <div class="relative pl-10">
                            <div class="absolute left-[6px] top-1 w-5 h-5 rounded-full border-4 border-white shadow-sm
                                {{ $index === 0 ? 'bg-blue-600 ring-4 ring-blue-100' : 'bg-slate-300' }}">
                            </div>

                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-1">
                                <div>
                                    <h4 class="font-bold text-slate-800 text-lg leading-none">
                                        {{ $update->status_label }}
                                    </h4>
                                    <p class="text-slate-600 font-medium mt-1">{{ $update->location }}</p>
                                    @if($update->description)
                                        <p class="text-sm text-slate-500 italic mt-1">"{{ $update->description }}"</p>
                                    @endif
                                </div>
                                <div class="text-xs font-mono font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded self-start mt-2 sm:mt-0">
                                    {{ $update->happened_at->format('d M Y, H:i') }} WIB
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-slate-400 italic">
                            {{ __('tracking.history_empty') }}
                        </div>
                    @endforelse

                    <div class="relative pl-10 opacity-70">
                        <div class="absolute left-[6px] top-1 w-5 h-5 rounded-full border-4 border-white bg-slate-300"></div>
                        <div>
                            <h4 class="font-bold text-slate-700">{{ __('tracking.order_created') }}</h4>
                            <p class="text-sm text-slate-500">{{ __('tracking.order_created_desc') }}</p>
                            <div class="text-xs font-mono text-slate-400 mt-1">
                                {{ $shipment->created_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-10 text-slate-400 text-sm">
            &copy; {{ date('Y') }} Nexus Logistics System. Real-time Tracking.
        </div>

    </div>
</body>
</html>