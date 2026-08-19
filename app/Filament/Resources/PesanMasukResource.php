<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanMasukResource\Pages;
use App\Filament\Resources\PesanMasukResource\RelationManagers;
use App\Models\PesanMasuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesanMasukResource extends Resource
{
    protected static ?string $model = PesanMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?string $navigationGroup = 'Hubungi Kami';
    protected static ?string $navigationLabel = 'Pesan Masuk & Kontak';
    protected static ?string $pluralModelLabel = 'Pesan Masuk';
    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->disabled(),
                Forms\Components\TextInput::make('email')
                    ->disabled(),
                Forms\Components\TextInput::make('no_hp')
                    ->disabled(),
                Forms\Components\TextInput::make('subjek')
                    ->disabled(),
                Forms\Components\Textarea::make('pesan')
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('dibaca')
                    ->label('Sudah Dibaca?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal & Status')
                    ->dateTime('d M Y, H:i')
                    ->description(fn (PesanMasuk $record): string => $record->dibaca ? 'Sudah Dibaca' : 'Belum Dibaca')
                    ->color(fn (PesanMasuk $record): string => $record->dibaca ? 'success' : 'warning')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Pengirim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Kontak')
                    ->description(fn (PesanMasuk $record): string => $record->no_hp ?? '-')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subjek')
                    ->label('Subjek & Isi Pesan')
                    ->description(fn (PesanMasuk $record): string => str($record->pesan)->limit(50))
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Buka/Tandai'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanMasuks::route('/'),
            'create' => Pages\CreatePesanMasuk::route('/create'),
            'edit' => Pages\EditPesanMasuk::route('/{record}/edit'),
        ];
    }
}
