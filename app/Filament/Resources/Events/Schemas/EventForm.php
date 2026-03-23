<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use App\Models\event;

use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rules\Numeric;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make("event_id")
                    ->label('Event ID')
                    ->default(function () {
                        $last = event::latest('id')->first();
                        $nextId = $last ? $last->id + 1 : 1;
                        return 'EVT-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
                    })
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('name_event')
                    ->label('Name Event')
                    ->required(),
                DatePicker::make('date')
                    ->label('Date')
                    ->required(),
                TextInput::make('location')
                    ->label('Location')
                    ->required(),
                TextInput::make('seat')
                    ->label('Seat')
                    ->required()
                    ->numeric(),
                Toggle::make('is_available')
                    ->label('Is Available')
                    ->default(true),
                FileUpload::make('photo')
                    ->label('Photo')
                    ->disk('public')
                    ->directory('photo')
                    ->required(),

            ]);
    }
}
