<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SloKategoriLayananResource\Pages;
use App\Filament\Resources\SloKategoriLayananResource\RelationManagers;
use App\Models\SloKategoriLayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SloKategoriLayananResource extends Resource
{
    protected static ?string $model = SloKategoriLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'SLO';
    protected static ?string $navigationLabel = 'Bidang Layanan';
    protected static ?string $pluralModelLabel = 'Kategori Layanan SLO';
    protected static ?string $modelLabel = 'Kategori Layanan SLO';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tambah Kategori Layanan SLO')
                    ->description('Tambah kategori layanan inspeksi baru')
                    ->schema([
                        Forms\Components\Select::make('kategori_utama')
                            ->label('Kategori Utama')
                            ->placeholder('Pilih kategori utama')
                            ->options(\App\Models\SloKategoriLayanan::kategoriOptions())
                            ->required(),
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Kategori')
                            ->placeholder('Contoh: Rumah Tinggal')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Deskripsi lengkap tentang kategori layanan')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('ikon')
                            ->label('Ikon (Emoji) (Opsional)')
                            ->placeholder('Contoh: 🏠')
                            ->helperText('Gunakan emoji untuk ikon kategori')
                            ->maxLength(255),
                        Forms\Components\Repeater::make('tags')
                            ->label('Tags (Opsional)')
                            ->simple(Forms\Components\TextInput::make('tag')->required())
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka lebih kecil akan tampil di atas'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status')
                            ->onIcon('heroicon-s-check')
                            ->offIcon('heroicon-s-x-mark')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('urutan')
                    ->label('URUTAN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori_utama')
                    ->label('KATEGORI')
                    ->formatStateUsing(fn ($state) => \App\Models\SloKategoriLayanan::kategoriOptions()[$state] ?? $state)
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('DESKRIPSI')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags')
                    ->label('TAGS')
                    ->badge(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('STATUS')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSloKategoriLayanans::route('/'),
            'create' => Pages\CreateSloKategoriLayanan::route('/create'),
            'edit' => Pages\EditSloKategoriLayanan::route('/{record}/edit'),
        ];
    }
}
