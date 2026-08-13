<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasis;

use App\Filament\Resources\ProfilStrukturOrganisasis\Pages\CreateProfilStrukturOrganisasi;
use App\Filament\Resources\ProfilStrukturOrganisasis\Pages\EditProfilStrukturOrganisasi;
use App\Filament\Resources\ProfilStrukturOrganisasis\Pages\ListProfilStrukturOrganisasis;
use App\Filament\Resources\ProfilStrukturOrganisasis\Schemas\ProfilStrukturOrganisasiForm;
use App\Filament\Resources\ProfilStrukturOrganisasis\Tables\ProfilStrukturOrganisasisTable;
use App\Models\ProfilStrukturOrganisasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilStrukturOrganisasiResource extends Resource
{
    protected static ?string $model = ProfilStrukturOrganisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfilStrukturOrganisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilStrukturOrganisasisTable::configure($table);
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
            'index' => ListProfilStrukturOrganisasis::route('/'),
            'create' => CreateProfilStrukturOrganisasi::route('/create'),
            'edit' => EditProfilStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
