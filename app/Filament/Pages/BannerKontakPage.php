<?php

namespace App\Filament\Pages;

use App\Models\KontenBeranda;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;

class BannerKontakPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Hubungi Kami';
    protected static ?string $navigationLabel = 'Banner Kontak';
    protected static ?string $title = 'Pengaturan Banner Kontak & CTA';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.banner-kontak-page';

    public ?array $data = [];

    public function mount(): void
    {
        $kontak = KontenBeranda::where('bagian', 'kontak_kami')->where('kunci', 'kontak_main')->first();
        $this->form->fill([
            'kontak_judul' => $kontak?->judul,
            'kontak_subjudul' => $kontak?->subjudul,
            'kontak_konten' => $kontak?->konten,
            'kontak_gambar' => $kontak?->path_gambar,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Atur headline, deskripsi, tombol ajakan, dan background banner agar tampilannya selaras dengan landing page.')
                    ->schema([
                        TextInput::make('kontak_judul')
                            ->label('Judul Banner')
                            ->placeholder('Contoh: Siap Bekerjasama?')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('kontak_subjudul')
                            ->label('Deskripsi Singkat')
                            ->placeholder('Contoh: Hubungi kami sekarang.')
                            ->rows(3)
                            ->columnSpanFull(),
                        TextInput::make('kontak_konten')
                            ->label('Teks Tombol CTA')
                            ->placeholder('Contoh: Kirim Pesan')
                            ->required(),
                        FileUpload::make('kontak_gambar')
                            ->label('Background Banner')
                            ->image()
                            ->directory('uploads/kontak')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $kontak = KontenBeranda::firstOrNew(['bagian' => 'kontak_kami', 'kunci' => 'kontak_main']);
        $kontak->judul = $data['kontak_judul'] ?? null;
        $kontak->subjudul = $data['kontak_subjudul'] ?? null;
        $kontak->konten = $data['kontak_konten'] ?? null;
        if(isset($data['kontak_gambar'])) $kontak->path_gambar = is_array($data['kontak_gambar']) ? array_values($data['kontak_gambar'])[0] : $data['kontak_gambar'];
        $kontak->save();
        
        Notification::make()->success()->title('Banner Kontak Disimpan!')->send();
    }
}
