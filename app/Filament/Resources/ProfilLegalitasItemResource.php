<?php

namespace App\Filament\Resources;

use App\Exports\ProfilLegalitasItemExport;
use App\Exports\ProfilLegalitasItemTemplateExport;
use App\Imports\ProfilLegalitasItemImport;
use App\Filament\Resources\ProfilLegalitasItemResource\Pages;
use App\Models\ProfilLegalitasItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                
                Forms\Components\Section::make('Informasi Dokumen')
                    ->schema([
                        Forms\Components\TextInput::make('kategori')
                            ->label('Kategori')
                            ->maxLength(255)
                            ->required()
                            ->default('Sertifikat Badan Usaha (SBU)'),
                        
                        Forms\Components\TextInput::make('nama_dokumen')
                            ->label('Jenis Perizinan / Nama Dokumen')
                            ->maxLength(255)
                            ->required(),
                            
                        Forms\Components\TextInput::make('bidang')
                            ->label('Bidang')
                            ->maxLength(255)
                            ->placeholder('Contoh: Pembangkitan Tenaga Listrik'),
                            
                        Forms\Components\TextInput::make('sub_bidang')
                            ->label('Sub Bidang')
                            ->maxLength(255)
                            ->placeholder('Contoh: Pembangkit Listrik Tenaga Surya'),
                    ])->columns(2),

                Forms\Components\Section::make('Nomor & Masa Berlaku')
                    ->schema([
                        Forms\Components\TextInput::make('no_sertifikat')
                            ->label('Nomor Sertifikat / Dokumen')
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('no_registrasi')
                            ->label('Nomor Registrasi')
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('penerbit')
                            ->label('Penerbit')
                            ->maxLength(255)
                            ->placeholder('Contoh: LPJK, ISO, dll.'),
                            
                        Forms\Components\DatePicker::make('tanggal_terbit')
                            ->label('Tanggal Terbit'),
                            
                        Forms\Components\DatePicker::make('berlaku_sampai')
                            ->label('Berlaku Sampai'),
                            
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Tidak Aktif' => 'Tidak Aktif',
                                'Dalam Proses Perpanjangan' => 'Dalam Proses Perpanjangan',
                            ])
                            ->required()
                            ->default('Aktif'),
                    ])->columns(2),

                Forms\Components\Section::make('Media & Lainnya')
                    ->schema([
                        Forms\Components\FileUpload::make('file')
                            ->label('Dokumen Lampiran (PDF/Gambar)')
                            ->directory('uploads/legalitas')
                            ->nullable(),
                            
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampil')
                            ->required()
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi / Keterangan')
                            ->columnSpanFull(),
                    ])->columns(2),
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
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('nama_dokumen')
                    ->label('Jenis Perizinan')
                    ->searchable()
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('bidang')
                    ->label('Bidang')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('no_sertifikat')
                    ->label('No. Sertifikat')
                    ->searchable()
                    ->fontFamily('mono'),
                    
                Tables\Columns\TextColumn::make('berlaku_sampai')
                    ->label('Berlaku Sampai')
                    ->date('d M Y')
                    ->sortable(),
                    
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Aktif',
                        'danger' => 'Tidak Aktif',
                        'warning' => 'Dalam Proses Perpanjangan',
                    ]),
                    
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options(fn () => ProfilLegalitasItem::distinct()->pluck('kategori', 'kategori')->toArray()),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Dalam Proses Perpanjangan' => 'Dalam Proses Perpanjangan',
                    ]),
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
            'index' => Pages\ListProfilLegalitasItems::route('/'),
            'create' => Pages\CreateProfilLegalitasItem::route('/create'),
            'edit' => Pages\EditProfilLegalitasItem::route('/{record}/edit'),
        ];
    }
}
