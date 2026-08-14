<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;
use App\Filament\Resources\ProfilDaftarPJTTTItemResource\RelationManagers;
use App\Models\ProfilDaftarPJTTTItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilDaftarPJTTTItemResource extends Resource
{
    protected static ?string $model = ProfilDaftarPJTTTItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel = 'Daftar PJT & TT';
    protected static ?string $pluralModelLabel = 'Daftar PJT & TT';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_daftar_p_j_t_t_t_id')
                    ->default(fn () => \App\Models\ProfilDaftarPJTTT::firstOrCreate([], ['judul' => 'Daftar PJT & TT'])->id),
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('jabatan')
                    ->options([
                        'PJT' => 'PJT',
                        'TT' => 'TT',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('no_sertifikat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_register')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan'),
                Tables\Columns\TextColumn::make('no_sertifikat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_register')
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
            'index' => Pages\ListProfilDaftarPJTTTItems::route('/'),
            'create' => Pages\CreateProfilDaftarPJTTTItem::route('/create'),
            'edit' => Pages\EditProfilDaftarPJTTTItem::route('/{record}/edit'),
        ];
    }
}
