<?php

namespace App\Filament\Pages;

use App\Models\KarirSettings;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Notifications\Notification;

class PengaturanKarirPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Karir';
    protected static ?string $navigationLabel = 'Pengaturan Karir';
    protected static ?string $title = 'Kelola: Pengaturan Karir';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.pengaturan-karir-page';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = KarirSettings::first();
        if ($settings) {
            $this->form->fill($settings->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola konten halaman karir termasuk deskripsi, benefit, dan statistik')
                    ->schema([
                        Textarea::make('description')
                            ->label('Deskripsi Mengapa Bergabung')
                            ->placeholder('Sebagai Lembaga Inspeksi Teknik (LIT) yang terus berkembang...')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Repeater::make('benefits')
                            ->label('Benefit Bergabung')
                            ->schema([
                                TextInput::make('judul')
                                    ->label('Judul benefit')
                                    ->required(),
                                Textarea::make('deskripsi')
                                    ->label('Deskripsi benefit')
                                    ->required(),
                                TextInput::make('icon')
                                    ->label('SVG icon path (optional)')
                                    ->nullable(),
                            ])
                            ->columnSpanFull(),
                        Section::make('Statistik Perusahaan')->schema([
                            Grid::make(4)->schema([
                                TextInput::make('years_experience')
                                    ->label('Tahun Pengalaman')
                                    ->default('10+')
                                    ->required(),
                                TextInput::make('projects_completed')
                                    ->label('Proyek Selesai')
                                    ->default('500+')
                                    ->required(),
                                TextInput::make('team_professionals')
                                    ->label('Tim Profesional')
                                    ->default('50+')
                                    ->required(),
                                TextInput::make('cities_served')
                                    ->label('Kota Layanan')
                                    ->default('30+')
                                    ->required(),
                            ]),
                        ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $settings = KarirSettings::first();
        
        if ($settings) {
            $settings->update($data);
        } else {
            KarirSettings::create($data);
        }

        Notification::make()
            ->title('Berhasil disimpan')
            ->success()
            ->send();
    }
}
