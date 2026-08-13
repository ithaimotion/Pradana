<?php

namespace App\Filament\Resources\SloRegulasis;

use App\Filament\Resources\SloRegulasis\Pages\CreateSloRegulasi;
use App\Filament\Resources\SloRegulasis\Pages\EditSloRegulasi;
use App\Filament\Resources\SloRegulasis\Pages\ListSloRegulasis;
use App\Filament\Resources\SloRegulasis\Schemas\SloRegulasiForm;
use App\Filament\Resources\SloRegulasis\Tables\SloRegulasisTable;
use App\Models\SloRegulasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SloRegulasiResource extends Resource
{
    protected static ?string $model = SloRegulasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SloRegulasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SloRegulasisTable::configure($table);
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
            'index' => ListSloRegulasis::route('/'),
            'create' => CreateSloRegulasi::route('/create'),
            'edit' => EditSloRegulasi::route('/{record}/edit'),
        ];
    }
}
