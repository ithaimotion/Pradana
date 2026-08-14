<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilLegalitasTenagaTeknikResource\Pages;
use App\Filament\Resources\ProfilLegalitasTenagaTeknikResource\RelationManagers;
use App\Models\ProfilLegalitasTenagaTeknik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilLegalitasTenagaTeknikResource extends Resource
{
    protected static ?string $model = ProfilLegalitasTenagaTeknik::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel = 'Legalitas Tenaga Teknik';
    protected static ?string $pluralModelLabel = 'Legalitas Tenaga Teknik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_legalitas_id')
                    ->default(fn () => \App\Models\ProfilLegalitas::firstOrCreate([], ['judul' => 'Legalitas'])->id),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('jabatan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_sertifikat')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('bidang_kompetensi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('Aktif'),
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
                Tables\Columns\TextColumn::make('no_sertifikat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bidang_kompetensi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
            'index' => Pages\ListProfilLegalitasTenagaTekniks::route('/'),
            'create' => Pages\CreateProfilLegalitasTenagaTeknik::route('/create'),
            'edit' => Pages\EditProfilLegalitasTenagaTeknik::route('/{record}/edit'),
        ];
    }
}
