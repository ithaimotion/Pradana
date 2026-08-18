<?php

namespace App\Filament\Resources;

use App\Exports\ProfilDaftarPJTTTExport;
use App\Exports\ProfilDaftarPJTTTTemplateExport;
use App\Imports\ProfilDaftarPJTTTImport;
use App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;
use App\Models\ProfilDaftarPJTTTItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;

class ProfilDaftarPJTTTItemResource extends Resource
{
    protected static ?string $model = ProfilDaftarPJTTTItem::class;

    protected static ?string $navigationIcon    = 'heroicon-o-users';
    protected static ?string $navigationGroup   = 'Kelola Profil (Data Tabel)';
    protected static ?string $navigationLabel   = 'Daftar PJT & TT';
    protected static ?string $pluralModelLabel  = 'Daftar PJT & TT';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('profil_daftar_p_j_t_t_t_id')
                    ->default(fn () => \App\Models\ProfilDaftarPJTTT::firstOrCreate([], ['judul' => 'Daftar PJT & TT'])->id),

                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori Instalasi')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('mis. Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('jabatan')
                    ->label('Jabatan')
                    ->options([
                        'PJT' => 'PJT – Penanggung Jawab Teknik',
                        'TT'  => 'TT – Tenaga Teknik',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\TextInput::make('no_sertifikat')
                    ->label('No. Sertifikat')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('no_register')
                    ->label('No. Register')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('urutan')
                    ->label('Urutan Tampil')
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
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('jabatan')
                    ->label('Jabatan')
                    ->colors([
                        'info'    => 'PJT',
                        'success' => 'TT',
                    ]),

                Tables\Columns\TextColumn::make('no_sertifikat')
                    ->label('No. Sertifikat')
                    ->searchable()
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('no_register')
                    ->label('No. Register')
                    ->searchable()
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
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
                Tables\Filters\SelectFilter::make('jabatan')
                    ->options([
                        'PJT' => 'PJT – Penanggung Jawab Teknik',
                        'TT'  => 'TT – Tenaga Teknik',
                    ])
                    ->label('Filter Jabatan'),

                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Filter Kategori')
                    ->options(fn () => ProfilDaftarPJTTTItem::distinct()->pluck('kategori', 'kategori')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('kategori');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfilDaftarPJTTTItems::route('/'),
            'create' => Pages\CreateProfilDaftarPJTTTItem::route('/create'),
            'edit'   => Pages\EditProfilDaftarPJTTTItem::route('/{record}/edit'),
        ];
    }
}
