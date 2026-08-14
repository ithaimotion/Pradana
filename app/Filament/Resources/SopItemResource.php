<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SopItemResource\Pages;
use App\Filament\Resources\SopItemResource\RelationManagers;
use App\Models\SopItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SopItemResource extends Resource
{
    protected static ?string $model = SopItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel = 'Item SOP';
    protected static ?string $pluralModelLabel = 'Item SOP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_sop_id')
                    ->default(fn () => \App\Models\ProfilSop::firstOrCreate([], ['judul' => 'SOP'])->id),
                Forms\Components\TextInput::make('kategori')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kode')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('judul')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('revisi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('url_dokumen')
                    ->directory('uploads/sop')
                    ->nullable(),
                Forms\Components\TextInput::make('urutan')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('status_aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('revisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_dokumen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),
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
            'index' => Pages\ListSopItems::route('/'),
            'create' => Pages\CreateSopItem::route('/create'),
            'edit' => Pages\EditSopItem::route('/{record}/edit'),
        ];
    }
}
