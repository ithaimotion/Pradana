<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilLegalitasItemResource\Pages;
use App\Filament\Resources\ProfilLegalitasItemResource\RelationManagers;
use App\Models\ProfilLegalitasItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilLegalitasItemResource extends Resource
{
    protected static ?string $model = ProfilLegalitasItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel = 'Item Legalitas';
    protected static ?string $pluralModelLabel = 'Item Legalitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_legalitas_id')
                    ->default(fn () => \App\Models\ProfilLegalitas::firstOrCreate([], ['judul' => 'Legalitas'])->id),
                Forms\Components\TextInput::make('kategori')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_dokumen')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nomor')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('penerbit')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_terbit'),
                Forms\Components\DatePicker::make('berlaku_sampai'),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('Aktif'),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('file')
                    ->directory('uploads/legalitas')
                    ->nullable(),
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
                Tables\Columns\TextColumn::make('nama_dokumen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penerbit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_terbit')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('berlaku_sampai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProfilLegalitasItems::route('/'),
            'create' => Pages\CreateProfilLegalitasItem::route('/create'),
            'edit' => Pages\EditProfilLegalitasItem::route('/{record}/edit'),
        ];
    }
}
