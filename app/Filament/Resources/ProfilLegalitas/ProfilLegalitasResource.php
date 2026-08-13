<?php

namespace App\Filament\Resources\ProfilLegalitas;

use App\Filament\Resources\ProfilLegalitas\Pages\CreateProfilLegalitas;
use App\Filament\Resources\ProfilLegalitas\Pages\EditProfilLegalitas;
use App\Filament\Resources\ProfilLegalitas\Pages\ListProfilLegalitas;
use App\Filament\Resources\ProfilLegalitas\Schemas\ProfilLegalitasForm;
use App\Filament\Resources\ProfilLegalitas\Tables\ProfilLegalitasTable;
use App\Models\ProfilLegalitas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilLegalitasResource extends Resource
{
    protected static ?string $model = ProfilLegalitas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfilLegalitasForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilLegalitasTable::configure($table);
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
            'index' => ListProfilLegalitas::route('/'),
            'create' => CreateProfilLegalitas::route('/create'),
            'edit' => EditProfilLegalitas::route('/{record}/edit'),
        ];
    }
}
