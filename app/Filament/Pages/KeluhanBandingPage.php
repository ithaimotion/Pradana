<?php

namespace App\Filament\Pages;

use App\Models\KeluhanBandingSetting;
use App\Models\KeluhanBandingSubmission;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\DeleteAction;

class KeluhanBandingPage extends Page implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Informasi Publik';
    protected static ?string $title = 'Kelola Keluhan & Banding';
    protected static string $view = 'filament.pages.keluhan-banding-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = KeluhanBandingSetting::first();
        if ($setting) {
            $this->form->fill([
                'path_gambar' => $setting->path_gambar,
            ]);
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Alur Keluhan & Banding')
                    ->description('Upload gambar alur keluhan dan banding')
                    ->schema([
                        FileUpload::make('path_gambar')
                            ->label('Gambar Alur')
                            ->image()
                            ->directory('keluhan-banding')
                            ->maxSize(5120)
                            ->helperText('Format PNG, JPG, WEBP maks 5MB')
                            ->required(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = KeluhanBandingSetting::first();

        if ($setting) {
            if ($setting->path_gambar && $setting->path_gambar !== $data['path_gambar']) {
                Storage::disk('public')->delete($setting->path_gambar);
            }
            $setting->update($data);
        } else {
            KeluhanBandingSetting::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Gambar alur berhasil disimpan.')
            ->success()
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(KeluhanBandingSubmission::query())
            ->heading('Submission Keluhan & Banding')
            ->description('Daftar keluhan atau banding dari pengguna.')
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('subjek')->label('Subjek')->searchable(),
                TextColumn::make('created_at')->label('Tanggal')->dateTime()->sortable(),
            ])
            ->actions([
                DeleteAction::make(),
            ]);
    }
}
