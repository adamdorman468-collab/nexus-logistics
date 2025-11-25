<?php

namespace App\Filament\Resources\Shipments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ShipmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tracking_number')
                    ->required(),
                TextInput::make('sender_name')
                    ->required(),
                TextInput::make('sender_phone')
                    ->tel()
                    ->required(),
                TextInput::make('receiver_name')
                    ->required(),
                Textarea::make('receiver_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('receiver_phone')
                    ->tel()
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('weight_kg')
                    ->numeric(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
