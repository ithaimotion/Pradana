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
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('divisi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('level')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('divisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProfilStrukturOrganisasiItems::route('/'),
            'create' => Pages\CreateProfilStrukturOrganisasiItem::route('/create'),
            'edit' => Pages\EditProfilStrukturOrganisasiItem::route('/{record}/edit'),
        ];
    }
}
