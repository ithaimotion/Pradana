<?php

namespace App\Filament\Resources\PesanMasuks;

use App\Filament\Resources\PesanMasuks\Pages\CreatePesanMasuk;
use App\Filament\Resources\PesanMasuks\Pages\EditPesanMasuk;
use App\Filament\Resources\PesanMasuks\Pages\ListPesanMasuks;
use App\Filament\Resources\PesanMasuks\Schemas\PesanMasukForm;
use App\Filament\Resources\PesanMasuks\Tables\PesanMasuksTable;
use App\Models\PesanMasuk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PesanMasukResource extends Resource
{
    protected static ?string $model = PesanMasuk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PesanMasukForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesanMasuksTable::configure($table);
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
            'index' => ListPesanMasuks::route('/'),
            'create' => CreatePesanMasuk::route('/create'),
            'edit' => EditPesanMasuk::route('/{record}/edit'),
        ];
    }
}
