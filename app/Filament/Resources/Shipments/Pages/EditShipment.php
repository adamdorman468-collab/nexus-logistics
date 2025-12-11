<?php

namespace App\Filament\Resources\Shipments\Pages;

use App\Filament\Resources\Shipments\ShipmentResource;
use Filament\Actions; // <--- Pake Actions Halaman
use Filament\Resources\Pages\EditRecord;

class EditShipment extends EditRecord
{
    protected static string $resource = ShipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('label_preview')
                ->label('Label Preview')
                ->icon('heroicon-o-printer')
                ->url(fn () => route('labels.download', ['tracking' => $this->record->tracking_number]))
                ->openUrlInNewTab(true),
        ];
    }
}