<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilPeralatanKetenagalistrikansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('gambar')
                    ->searchable(),
                TextColumn::make('jenis_alat')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                TextColumn::make('status_kalibrasi')
                    ->searchable(),
                TextColumn::make('tanggal_kalibrasi')
                    ->date()
                    ->sortable(),
                TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('status_aktif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
