<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\PesanMasuk;

class LatestPesanMasuk extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Pesan Masuk Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(PesanMasuk::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Pengirim'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Kontak')
                    ->description(fn (PesanMasuk $record): string => $record->no_hp ?? '-'),
                Tables\Columns\TextColumn::make('subjek')
                    ->label('Subjek & Pesan')
                    ->description(fn (PesanMasuk $record): string => str($record->pesan)->limit(50)),
                Tables\Columns\IconColumn::make('dibaca')
                    ->boolean()
                    ->label('Dibaca'),
            ])
            ->actions([
                Tables\Actions\Action::make('buka')
                    ->label('Lihat')
                    ->url(fn (PesanMasuk $record): string => \App\Filament\Resources\PesanMasukResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-m-eye'),
            ])
            ->paginated(false);
    }
}
