<?php

namespace App\Filament\Resources\PesanMasukResource\Widgets;

use App\Models\InformasiKontakSetting;
use App\Models\KontenBeranda;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\FileUpload;
use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;
use Filament\Forms\Get;
use Filament\Notifications\Notification;

class PengaturanKontakWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.resources.pesan-masuk-resource.widgets.pengaturan-kontak-widget';

    // Ensure the widget occupies full width
    protected int | string | array $columnSpan = 'full';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = InformasiKontakSetting::first();
        $kontak = KontenBeranda::where('bagian', 'kontak_kami')->where('kunci', 'kontak_main')->first();
        
        $initialData = $settings ? $settings->toArray() : [];
        $initialData = array_merge($initialData, [
            'kontak_judul' => $kontak?->judul,
            'kontak_subjudul' => $kontak?->subjudul,
            'kontak_konten' => $kontak?->konten,
            'kontak_url' => $kontak?->nilai,
            'kontak_gambar' => $kontak?->path_gambar,
        ]);
        
        $this->form->fill($initialData);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pengaturan Banner Kontak & CTA')
                    ->description('Atur headline, deskripsi, tombol ajakan, dan background banner agar tampilannya selaras dengan landing page.')
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
                        TextInput::make('kontak_url')
                            ->label('URL Tombol CTA')
                            ->placeholder('Contoh: hubungi-kami')
                            ->nullable(),
                        FileUpload::make('kontak_gambar')
                            ->label('Background Banner')
                            ->image()
                            ->directory('uploads/kontak')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Pengaturan Informasi Hubungi Kami')
                    ->description('Ubah teks deskripsi, alamat, kontak, dan maps yang ditampilkan pada halaman website Hubungi Kami.')
                    ->schema([
                        Textarea::make('deskripsi_utama')
                            ->label('Deskripsi Utama')
                            ->placeholder('Contoh: Kunjungi kantor kami atau hubungi kami...')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('alamat_kantor')
                            ->label('Alamat Kantor')
                            ->placeholder('Contoh: Jl. Sumatra Blok B No. 85...')
                            ->rows(3)
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('telepon_whatsapp')
                            ->label('Telepon & WhatsApp')
                            ->placeholder('Contoh: 021-8498 715 & +6287857603660')
                            ->required(),
                        TextInput::make('email_resmi')
                            ->label('Email Resmi')
                            ->email()
                            ->placeholder('Contoh: nusaenergi999@gmail.com')
                            ->required(),
                        TextInput::make('jam_operasional')
                            ->label('Jam Operasional')
                            ->placeholder('Contoh: Senin - Jumat, 08:00 - 17:00')
                            ->required(),
                        Textarea::make('embed_maps')
                            ->label('Embed Maps')
                            ->placeholder('Paste kode iframe Google Maps di sini...')
                            ->rows(4)
                            ->live(debounce: 500)
                            ->columnSpanFull(),
                        Placeholder::make('map_preview')
                            ->label('Preview Maps')
                            ->content(function (Get $get) {
                                $html = $get('embed_maps');
                                if (!$html) {
                                    return new HtmlString('<div class="p-4 bg-gray-100 dark:bg-gray-800 rounded text-center text-gray-500 text-sm">Preview akan muncul di sini saat Anda menempelkan kode embed.</div>');
                                }
                                
                                $html = preg_replace('/width="[^"]+"/', 'width="100%"', $html);
                                $html = preg_replace('/height="[^"]+"/', 'height="300"', $html);
                                
                                return new HtmlString('<div class="rounded-xl overflow-hidden border border-gray-300 dark:border-gray-700">' . $html . '</div>');
                            })
                            ->columnSpanFull(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        // Save Kontak Setting
        $settings = InformasiKontakSetting::first();
        if ($settings) {
            $settings->update($data);
        } else {
            InformasiKontakSetting::create($data);
        }
        
        // Save Banner Kontak
        $kontak = KontenBeranda::firstOrNew(['bagian' => 'kontak_kami', 'kunci' => 'kontak_main']);
        $kontak->judul = $data['kontak_judul'] ?? null;
        $kontak->subjudul = $data['kontak_subjudul'] ?? null;
        $kontak->konten = $data['kontak_konten'] ?? null;
        $kontak->nilai = $data['kontak_url'] ?? null;
        if (isset($data['kontak_gambar'])) {
            $kontak->path_gambar = is_array($data['kontak_gambar']) ? array_values($data['kontak_gambar'])[0] : $data['kontak_gambar'];
        }
        $kontak->save();
        
        Notification::make()->success()->title('Pengaturan berhasil disimpan!')->send();
    }
}
