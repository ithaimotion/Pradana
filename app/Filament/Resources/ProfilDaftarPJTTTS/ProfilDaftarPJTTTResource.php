<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTS;

use App\Filament\Resources\ProfilDaftarPJTTTS\Pages\CreateProfilDaftarPJTTT;
use App\Filament\Resources\ProfilDaftarPJTTTS\Pages\EditProfilDaftarPJTTT;
use App\Filament\Resources\ProfilDaftarPJTTTS\Pages\ListProfilDaftarPJTTTS;
use App\Filament\Resources\ProfilDaftarPJTTTS\Schemas\ProfilDaftarPJTTTForm;
use App\Filament\Resources\ProfilDaftarPJTTTS\Tables\ProfilDaftarPJTTTSTable;
use App\Models\ProfilDaftarPJTTT;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilDaftarPJTTTResource extends Resource
{
    protected static ?string $model = ProfilDaftarPJTTT::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfilDaftarPJTTTForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilDaftarPJTTTSTable::configure($table);
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
            'index' => ListProfilDaftarPJTTTS::route('/'),
            'create' => CreateProfilDaftarPJTTT::route('/create'),
            'edit' => EditProfilDaftarPJTTT::route('/{record}/edit'),
        ];
    }
}
