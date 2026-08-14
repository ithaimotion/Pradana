<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LowonganKerjaResource\Pages;
use App\Models\LowonganKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LowonganKerjaResource extends Resource
{
    protected static ?string $model = LowonganKerja::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Karir';
    protected static ?string $navigationLabel = 'Lowongan Kerja';
    protected static ?string $pluralModelLabel = 'Lowongan Kerja';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('divisi')
                    ->options([
                        'IT' => 'IT',
                        'Marketing' => 'Marketing',
                        'Finance' => 'Finance',
                        'HRD' => 'HRD',
                        'Operation' => 'Operation',
                    ])
                    ->required(),
                Forms\Components\Select::make('tipe')
                    ->options(LowonganKerja::tipeOptions())
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('link_lamar')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('urutan')
                    ->numeric(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Forms\Components\RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('persyaratan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('divisi')->searchable(),
                Tables\Columns\TextColumn::make('tipe'),
                Tables\Columns\TextColumn::make('lokasi'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Status'),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
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
            'index' => Pages\ManageLowonganKerjas::route('/'),
        ];
    }
}
