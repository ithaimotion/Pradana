<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Galeri & Client';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?string $slug = 'galeri-umum';
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'umum');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kelola Foto Galeri')
                    ->schema([
                        Forms\Components\Hidden::make('kategori')
                            ->default('umum'),
                        Forms\Components\FileUpload::make('path_gambar')
                            ->label('Upload Foto Galeri')
                            ->image()
                            ->directory('uploads/galeri')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul / Keterangan Foto')
                            ->placeholder('Contoh: Inspeksi Genset Sub-station')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(1),
                        Forms\Components\Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path_gambar')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul / Keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_aktif')
                    ->label('Status Aktif')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGaleris::route('/'),
        ];
    }
}
