<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikans;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Pages\CreateProfilPeralatanKetenagalistrikan;
use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Pages\EditProfilPeralatanKetenagalistrikan;
use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Pages\ListProfilPeralatanKetenagalistrikans;
use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Schemas\ProfilPeralatanKetenagalistrikanForm;
use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Tables\ProfilPeralatanKetenagalistrikansTable;
use App\Models\ProfilPeralatanKetenagalistrikan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilPeralatanKetenagalistrikanResource extends Resource
{
    protected static ?string $model = ProfilPeralatanKetenagalistrikan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfilPeralatanKetenagalistrikanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilPeralatanKetenagalistrikansTable::configure($table);
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
            'index' => ListProfilPeralatanKetenagalistrikans::route('/'),
            'create' => CreateProfilPeralatanKetenagalistrikan::route('/create'),
            'edit' => EditProfilPeralatanKetenagalistrikan::route('/{record}/edit'),
        ];
    }
}
