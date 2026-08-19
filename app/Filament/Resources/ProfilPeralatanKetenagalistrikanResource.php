<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Pages;
use App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\RelationManagers;
use App\Models\ProfilPeralatanKetenagalistrikan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilPeralatanKetenagalistrikanResource extends Resource
{
    protected static ?string $model = ProfilPeralatanKetenagalistrikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Profil';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Peralatan Ketenagalistrikan';
    protected static ?string $pluralModelLabel = 'Peralatan Ketenagalistrikan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('auto_fill_ai')
                        ->label('✨ Auto-Fill dengan AI')
                        ->color('primary')
                        ->icon('heroicon-m-sparkles')
                        ->form([
                            Forms\Components\TextInput::make('ai_prompt')
                                ->label('Nama Alat / Deskripsi Singkat')
                                ->placeholder('Contoh: Alat ukur tahanan isolasi (Megger)')
                                ->required(),
                        ])
                        ->action(function (array $data, Forms\Set $set, $livewire) {
                            $result = \App\Services\GeminiService::generatePeralatanData($data['ai_prompt']);
                            
                            if (is_string($result) && str_starts_with($result, 'Error:')) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Gagal Auto-Fill')
                                    ->body($result)
                                    ->danger()
                                    ->send();
                                return;
                            }

                            if (is_array($result)) {
                                $set('nama', $result['nama'] ?? null);
                                $set('kategori', $result['kategori'] ?? null);
                                $set('jenis_alat', $result['jenis_alat'] ?? null);
                                $set('model', $result['model'] ?? null);
                                $set('deskripsi_singkat', $result['deskripsi_singkat'] ?? null);
                                $set('spesifikasi', is_array($result['spesifikasi'] ?? []) ? implode("\n", $result['spesifikasi']) : ($result['spesifikasi'] ?? ''));
                                
                                // Set specific default fields based on user request
                                $set('tanggal_kalibrasi', now()->format('Y-m-d'));
                                $set('status_kalibrasi', 'Terkalibrasi');
                                $set('urutan', \App\Models\ProfilPeralatanKetenagalistrikan::max('urutan') + 1);
                                
                                // Process Image Downloading
                                $imageKeyword = $result['image_keyword'] ?? null;
                                if ($imageKeyword) {
                                    $imagePath = \App\Services\GeminiService::downloadImage($imageKeyword);
                                    if ($imagePath) {
                                        // Filament FileUpload expects the state to be an array
                                        $set('gambar', [
                                            (string) \Illuminate\Support\Str::uuid() => $imagePath
                                        ]);
                                    }
                                }

                                \Filament\Notifications\Notification::make()
                                    ->title('Form Berhasil Diisi!')
                                    ->success()
                                    ->send();
                            }
                        })
                ])->columnSpanFull(),

                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Peralatan')
                            ->placeholder('Contoh: Earth Resistance Tester')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('kategori')
                                ->label('Kategori')
                                ->placeholder('Contoh: Alat Ukur')
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('jenis_alat')
                                ->label('Jenis Alat')
                                ->placeholder('Contoh: Digital Earth Resistance Tester')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('model')
                                ->label('Model')
                                ->placeholder('Contoh: Megger DET14C')
                                ->maxLength(255),
                            Forms\Components\Select::make('status_kalibrasi')
                                ->label('Status Kalibrasi')
                                ->options([
                                    'Terkalibrasi' => 'Terkalibrasi',
                                    'Menunggu Kalibrasi' => 'Menunggu Kalibrasi',
                                ])
                                ->placeholder('-- Pilih Status --'),
                            Forms\Components\DatePicker::make('tanggal_kalibrasi')
                                ->label('Tanggal Kalibrasi'),
                            Forms\Components\TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                        ]),
                        Forms\Components\Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Media & Detail')
                    ->schema([
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Upload Gambar Peralatan')
                            ->image()
                            ->directory('uploads/peralatan')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('deskripsi_singkat')
                            ->label('Deskripsi Singkat')
                            ->placeholder('Mengukur nilai resistansi pembumian...')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('spesifikasi')
                            ->label('Spesifikasi (satu per baris)')
                            ->placeholder("Contoh:\nRentang: 0.01Ω - 20kΩ\nTegangan uji: 25V & 50V")
                            ->rows(5)
                            ->formatStateUsing(fn ($state) => is_array($state) ? implode("\n", $state) : (string) $state)
                            ->dehydrateStateUsing(fn ($state) => array_filter(array_map('trim', is_array($state) ? $state : explode("\n", (string) $state))))
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Peralatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_kalibrasi')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Terkalibrasi' => 'success',
                        'Menunggu Kalibrasi' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('status_aktif')
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
            'index' => Pages\ListProfilPeralatanKetenagalistrikans::route('/'),
            'create' => Pages\CreateProfilPeralatanKetenagalistrikan::route('/create'),
            'edit' => Pages\EditProfilPeralatanKetenagalistrikan::route('/{record}/edit'),
        ];
    }
}
