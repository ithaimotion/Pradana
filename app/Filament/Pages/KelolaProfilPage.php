<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use App\Models\KontenHalaman;

class KelolaProfilPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Kelola Sub-Profil';
    protected static ?string $title = 'Kelola Sub-Profil Perusahaan';
    protected static ?string $slug = 'profil/kelola';

    protected static string $view = 'filament.pages.kelola-profil-page';

    public ?array $pjtData = [];
    public ?array $strukturData = [];
    public ?array $legalitasData = [];
    public ?array $sopData = [];

    public function mount(): void
    {
        $this->pjtForm->fill($this->loadData('profil_pjt_tt'));
        $this->strukturForm->fill($this->loadData('profil_struktur'));
        $this->legalitasForm->fill($this->loadData('profil_legalitas'));
        $this->sopForm->fill($this->loadData('profil_sop'));
    }

    private function loadData($halaman): array
    {
        $data = KontenHalaman::where('halaman', $halaman)->where('kunci', 'dokumen_utama')->first();
        if (!$data) return [];
        return [
            'dokumen' => $data->path_dokumen ?? $data->path_gambar,
        ];
    }

    protected function getForms(): array
    {
        return [
            'pjtForm',
            'strukturForm',
            'legalitasForm',
            'sopForm',
        ];
    }

    private function buildFormSchema(string $title, string $label): array
    {
        return [
            Section::make($title)
                ->schema([
                    FileUpload::make('dokumen')
                        ->label($label)
                        ->directory('uploads/profil')
                        ->columnSpanFull(),
                ])
        ];
    }

    public function pjtForm(Form $form): Form
    {
        return $form->schema($this->buildFormSchema('Kelola Daftar PJT & TT', 'Upload File PJT & TT (Gambar/PDF)'))->statePath('pjtData');
    }

    public function strukturForm(Form $form): Form
    {
        return $form->schema($this->buildFormSchema('Kelola Struktur Organisasi', 'Upload File Struktur Organisasi (Gambar/PDF)'))->statePath('strukturData');
    }

    public function legalitasForm(Form $form): Form
    {
        return $form->schema($this->buildFormSchema('Kelola Legalitas Perusahaan', 'Upload File Legalitas (Gambar/PDF)'))->statePath('legalitasData');
    }

    public function sopForm(Form $form): Form
    {
        return $form->schema($this->buildFormSchema('Kelola Standar Operasional Prosedur', 'Upload File SOP (Gambar/PDF)'))->statePath('sopData');
    }

    private function saveData($halaman, $data, $successMessage)
    {
        $record = KontenHalaman::firstOrNew(['halaman' => $halaman, 'kunci' => 'dokumen_utama']);
        if(isset($data['dokumen'])) {
            $file = is_array($data['dokumen']) ? array_values($data['dokumen'])[0] : $data['dokumen'];
            $record->path_dokumen = $file;
        }
        $record->save();
        Notification::make()->success()->title($successMessage)->send();
    }

    public function savePjt(): void { $this->saveData('profil_pjt_tt', $this->pjtForm->getState(), 'Data PJT & TT Disimpan!'); }
    public function saveStruktur(): void { $this->saveData('profil_struktur', $this->strukturForm->getState(), 'Data Struktur Organisasi Disimpan!'); }
    public function saveLegalitas(): void { $this->saveData('profil_legalitas', $this->legalitasForm->getState(), 'Data Legalitas Disimpan!'); }
    public function saveSop(): void { $this->saveData('profil_sop', $this->sopForm->getState(), 'Data SOP Disimpan!'); }
}
