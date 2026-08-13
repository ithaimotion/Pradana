<?php

namespace App\Filament\Resources\ProfilSops;

use App\Filament\Resources\ProfilSops\Pages\CreateProfilSop;
use App\Filament\Resources\ProfilSops\Pages\EditProfilSop;
use App\Filament\Resources\ProfilSops\Pages\ListProfilSops;
use App\Filament\Resources\ProfilSops\Schemas\ProfilSopForm;
use App\Filament\Resources\ProfilSops\Tables\ProfilSopsTable;
use App\Models\ProfilSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilSopResource extends Resource
{
    protected static ?string $model = ProfilSop::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfilSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilSopsTable::configure($table);
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
            'index' => ListProfilSops::route('/'),
            'create' => CreateProfilSop::route('/create'),
            'edit' => EditProfilSop::route('/{record}/edit'),
        ];
    }
}
