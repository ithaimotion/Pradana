<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SloRegulasiResource\Pages;
use App\Filament\Resources\SloRegulasiResource\RelationManagers;
use App\Models\SloRegulasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SloRegulasiResource extends Resource
{
    protected static ?string $model = SloRegulasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'SLO';
    protected static ?string $navigationLabel = 'Regulasi';
    protected static ?string $pluralModelLabel = 'Regulasi SLO';
    protected static ?string $modelLabel = 'Regulasi SLO';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kelola Regulasi SLO')
                    ->description('Tambah atau edit data regulasi SLO')
                    ->schema([
                        Forms\Components\Select::make('tipe')
                            ->label('Tipe / Kategori Regulasi')
                            ->options(\App\Models\SloRegulasi::tipeOptions())
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('nomor')
                            ->label('Judul Regulasi')
                            ->placeholder('Contoh: UU No. 30 Tahun 2009')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->placeholder('Deskripsi lengkap tentang regulasi')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('url_dokumen')
                            ->label('Dokumen Regulasi (Opsional)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(51200) // 50MB
                            ->directory('uploads/regulasi')
                            ->helperText('Upload file PDF (Maksimal 50MB)')
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                            Forms\Components\Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true),
                        ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('urutan')
                    ->label('URUTAN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipe')
                    ->label('TIPE')
                    ->formatStateUsing(fn ($state) => \App\Models\SloRegulasi::tipeOptions()[$state] ?? $state)
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->label('JUDUL REGULASI')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('KETERANGAN')
                    ->limit(50)
                    ->searchable(),
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
            'index' => Pages\ListSloRegulasis::route('/'),
            'create' => Pages\CreateSloRegulasi::route('/create'),
            'edit' => Pages\EditSloRegulasi::route('/{record}/edit'),
        ];
    }
}
