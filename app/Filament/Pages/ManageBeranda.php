<?php

namespace App\Filament\Pages;

use App\Models\KontenBeranda;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class ManageBeranda extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-beranda';

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-home';
    }

    public static function getNavigationLabel(): string
    {
        return 'Beranda';
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Pengaturan Beranda';
    }

    public ?array $data = [];

    public function mount(): void
    {
        $kontens = KontenBeranda::all()->keyBy('bagian');

        $this->form->fill([
            'hero_judul' => $kontens['hero']->judul ?? '',
            'hero_subjudul' => $kontens['hero']->subjudul ?? '',
            'hero_path_gambar' => $kontens['hero']->path_gambar ?? '',

            'tentang_judul' => $kontens['tentang-pradana']->judul ?? '',
            'tentang_konten' => $kontens['tentang-pradana']->konten ?? '',
            'tentang_path_gambar' => $kontens['tentang-pradana']->path_gambar ?? '',
            
            'teknologi_judul' => $kontens['teknologi-header']->judul ?? '',
            'teknologi_subjudul' => $kontens['teknologi-header']->subjudul ?? '',

            'keunggulan_judul' => $kontens['keunggulan-header']->judul ?? '',
            'keunggulan_subjudul' => $kontens['keunggulan-header']->subjudul ?? '',

            'energi_judul' => $kontens['energi-header']->judul ?? '',
            'energi_subjudul' => $kontens['energi-header']->subjudul ?? '',

            'mengapa_judul' => $kontens['mengapa-header']->judul ?? '',
            'mengapa_subjudul' => $kontens['mengapa-header']->subjudul ?? '',

            'kontak_judul' => $kontens['kontak-header']->judul ?? '',
            'kontak_subjudul' => $kontens['kontak-header']->subjudul ?? '',
        ]);
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                    Tabs::make('Beranda Tabs')
                        ->tabs([
                            Tabs\Tab::make('Hero')
                                ->components([
                                    TextInput::make('hero_judul')->label('Judul'),
                                    TextInput::make('hero_subjudul')->label('Subjudul'),
                                    FileUpload::make('hero_path_gambar')->label('Gambar Background')->image(),
                                ]),
                            Tabs\Tab::make('Tentang Pradana')
                                ->components([
                                    TextInput::make('tentang_judul')->label('Judul'),
                                    RichEditor::make('tentang_konten')->label('Konten'),
                                    FileUpload::make('tentang_path_gambar')->label('Gambar Utama')->image(),
                                ]),
                            Tabs\Tab::make('Teknologi Header')
                                ->components([
                                    TextInput::make('teknologi_judul')->label('Judul'),
                                    TextInput::make('teknologi_subjudul')->label('Subjudul'),
                                ]),
                            Tabs\Tab::make('Keunggulan Header')
                                ->components([
                                    TextInput::make('keunggulan_judul')->label('Judul'),
                                    TextInput::make('keunggulan_subjudul')->label('Subjudul'),
                                ]),
                            Tabs\Tab::make('Energi Header')
                                ->components([
                                    TextInput::make('energi_judul')->label('Judul'),
                                    TextInput::make('energi_subjudul')->label('Subjudul'),
                                ]),
                            Tabs\Tab::make('Mengapa Header')
                                ->components([
                                    TextInput::make('mengapa_judul')->label('Judul'),
                                    TextInput::make('mengapa_subjudul')->label('Subjudul'),
                                ]),
                            Tabs\Tab::make('Kontak Header')
                                ->components([
                                    TextInput::make('kontak_judul')->label('Judul'),
                                    TextInput::make('kontak_subjudul')->label('Subjudul'),
                                ]),
                        ])
                ])
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();

        // Update Hero
        KontenBeranda::updateOrCreate(['bagian' => 'hero'], [
            'judul' => $state['hero_judul'],
            'subjudul' => $state['hero_subjudul'],
            'path_gambar' => $state['hero_path_gambar'],
        ]);

        // Update Tentang
        KontenBeranda::updateOrCreate(['bagian' => 'tentang-pradana'], [
            'judul' => $state['tentang_judul'],
            'konten' => $state['tentang_konten'],
            'path_gambar' => $state['tentang_path_gambar'],
        ]);

        // Update Headers
        $headers = ['teknologi', 'keunggulan', 'energi', 'mengapa', 'kontak'];
        foreach ($headers as $h) {
            KontenBeranda::updateOrCreate(['bagian' => $h . '-header'], [
                'judul' => $state[$h . '_judul'],
                'subjudul' => $state[$h . '_subjudul'],
            ]);
        }

        Notification::make()
            ->title('Berhasil disimpan')
            ->success()
            ->send();
    }
}
