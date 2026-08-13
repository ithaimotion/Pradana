<?php

namespace App\Filament\Resources\SloKategoriLayanans;

use App\Filament\Resources\SloKategoriLayanans\Pages\CreateSloKategoriLayanan;
use App\Filament\Resources\SloKategoriLayanans\Pages\EditSloKategoriLayanan;
use App\Filament\Resources\SloKategoriLayanans\Pages\ListSloKategoriLayanans;
use App\Filament\Resources\SloKategoriLayanans\Schemas\SloKategoriLayananForm;
use App\Filament\Resources\SloKategoriLayanans\Tables\SloKategoriLayanansTable;
use App\Models\SloKategoriLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SloKategoriLayananResource extends Resource
{
    protected static ?string $model = SloKategoriLayanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SloKategoriLayananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SloKategoriLayanansTable::configure($table);
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
            'index' => ListSloKategoriLayanans::route('/'),
            'create' => CreateSloKategoriLayanan::route('/create'),
            'edit' => EditSloKategoriLayanan::route('/{record}/edit'),
        ];
    }
}
