<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Toggle;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;


class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event_id')
                    ->label('Event ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name_event')
                    ->label('Name Event')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Date'),
                TextColumn::make('location')
                    ->label('Location')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_available')
                    ->label('Is Available')
                    ->boolean(),
                TextColumn::make('seat')
                    ->label('Seat')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
