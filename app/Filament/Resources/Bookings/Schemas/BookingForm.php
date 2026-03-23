<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\event;
use App\Models\booking;
use Filament\Forms\Components\Toggle;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make("booking_id")
                    ->label('Booking ID')
                    ->default(function () {
                        $lastBooking = booking::latest('id')->first();
                        $nextId = $lastBooking ? $lastBooking->id + 1 : 1;
                        return 'BK-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
                    })
                    ->disabled()
                    ->dehydrated(),
                Select::make('event_id')
                    ->label('Event')
                    ->options(event::all()->pluck('name_event', 'id'))
                    ->required(),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
                Toggle::make('is_available')
                    ->label('Is Available')
                    ->default(true),
            ]);
    }
}
