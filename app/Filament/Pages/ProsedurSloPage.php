<?php

namespace App\Filament\Pages;

use App\Models\ProsedurSlo;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ProsedurSloPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'Standar Pelayanan';
    protected static ?string $title = 'Kelola: Prosedur SLO';
    protected static string $view = 'filament.pages.prosedur-slo-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = ProsedurSlo::first();
        if ($setting) {
            $this->form->fill($setting->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Prosedur SLO')
                    ->tabs([
                        Tabs\Tab::make('Dokumen PDF')
                            ->schema([
                                FileUpload::make('path_pdf')
                                    ->label('Upload PDF')
                                    ->directory('prosedur-slo')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240)
                                    ->required(),
                                TextInput::make('nama_dokumen')
                                    ->label('Nama Dokumen')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Timeline')
                            ->schema([
                                Repeater::make('timeline_steps')
                                    ->label('Tahapan Timeline')
                                    ->schema([
                                        TextInput::make('title')->label('Judul Tahapan')->required(),
                                        TextInput::make('description')->label('Deskripsi'),
                                    ]),
                            ]),
                        Tabs\Tab::make('Detail Tahapan')
                            ->schema([
                                Repeater::make('accordion_content')
                                    ->label('Detail Tahapan (Accordion)')
                                    ->schema([
                                        TextInput::make('title')->label('Judul')->required(),
                                        RichEditor::make('content')->label('Konten'),
                                    ]),
                            ]),
                        Tabs\Tab::make('Dokumen')
                            ->schema([
                                Repeater::make('required_documents')
                                    ->label('Dokumen Persyaratan')
                                    ->simple(TextInput::make('document_name')->required()),
                            ]),
                        Tabs\Tab::make('FAQ')
                            ->schema([
                                Repeater::make('faq_content')
                                    ->label('Tanya Jawab (FAQ)')
                                    ->schema([
                                        TextInput::make('question')->label('Pertanyaan')->required(),
                                        RichEditor::make('answer')->label('Jawaban')->required(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Pengaturan')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Tampilkan di Halaman Publik')
                                    ->default(true),
                            ]),
                    ])->columnSpanFull()
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = ProsedurSlo::first();

        if ($setting) {
            if (isset($data['path_pdf']) && $setting->path_pdf && $setting->path_pdf !== $data['path_pdf']) {
                Storage::disk('public')->delete($setting->path_pdf);
            }
            $setting->update($data);
        } else {
            ProsedurSlo::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Prosedur SLO berhasil disimpan.')
            ->success()
            ->send();
    }
}
