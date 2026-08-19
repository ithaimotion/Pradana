<?php

namespace App\Filament\Pages;

use App\Models\PersyaratanSlo;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class PersyaratanSloPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Standar Pelayanan';
    protected static ?string $title = 'Kelola: Persyaratan SLO';
    protected static string $view = 'filament.pages.persyaratan-slo-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = PersyaratanSlo::first();
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
                Tabs::make('Persyaratan SLO')
                    ->tabs([
                        Tabs\Tab::make('SLO IPTL TM')
                            ->schema([
                                Repeater::make('iptl_tm_admin')
                                    ->label('Persyaratan Administrasi')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                                Repeater::make('iptl_tm_teknis')
                                    ->label('Persyaratan Teknis')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                            ]),
                        Tabs\Tab::make('SLO Distribusi')
                            ->schema([
                                Repeater::make('distribusi_admin')
                                    ->label('Persyaratan Administrasi')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                                Repeater::make('distribusi_teknis')
                                    ->label('Persyaratan Teknis')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                            ]),
                        Tabs\Tab::make('SLO PLTD')
                            ->schema([
                                Repeater::make('pltd_admin')
                                    ->label('Persyaratan Administrasi')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                                Repeater::make('pltd_teknis')
                                    ->label('Persyaratan Teknis')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                            ]),
                        Tabs\Tab::make('SLO PLTS')
                            ->schema([
                                Repeater::make('plts_admin')
                                    ->label('Persyaratan Administrasi')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                                Repeater::make('plts_teknis')
                                    ->label('Persyaratan Teknis')
                                    ->simple(TextInput::make('item')->required())
                                    ->addActionLabel('Tambah Item'),
                            ]),
                    ])->columnSpanFull()
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = PersyaratanSlo::first();

        if ($setting) {
            $setting->update($data);
        } else {
            PersyaratanSlo::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Persyaratan SLO berhasil disimpan.')
            ->success()
            ->send();
    }
}
