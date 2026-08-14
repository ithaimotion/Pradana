<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilStrukturOrganisasiItemResource\Pages;
use App\Filament\Resources\ProfilStrukturOrganisasiItemResource\RelationManagers;
use App\Models\ProfilStrukturOrganisasiItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilStrukturOrganisasiItemResource extends Resource
{
    protected static ?string $model = ProfilStrukturOrganisasiItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel = 'Item Struktur Organisasi';
    protected static ?string $pluralModelLabel = 'Item Struktur Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_struktur_organisasi_id')
                    ->default(fn () => \App\Models\ProfilStrukturOrganisasi::firstOrCreate([], ['judul' => 'Struktur Organisasi'])->id),
                Forms\Components\FileUpload::make('foto')
                    ->label('Upload Foto Struktur / Bagan')
                    ->image()
                    ->directory('uploads/struktur_organisasi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Struktur')
                    ->width(100)
                    ->height(100),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return ProfilStrukturOrganisasiItem::count() === 0;
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
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
            'index' => Pages\ListProfilStrukturOrganisasiItems::route('/'),
            'create' => Pages\CreateProfilStrukturOrganisasiItem::route('/create'),
            'edit' => Pages\EditProfilStrukturOrganisasiItem::route('/{record}/edit'),
        ];
    }
}
