<?php

namespace App\Filament\Resources\ProfilLegalitasItemResource\Pages;

use App\Exports\ProfilLegalitasItemExport;
use App\Exports\ProfilLegalitasItemTemplateExport;
use App\Imports\ProfilLegalitasItemImport;
use App\Filament\Resources\ProfilLegalitasItemResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListProfilLegalitasItems extends ListRecords
{
    protected static string $resource = ProfilLegalitasItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Legalitas')
                ->icon('heroicon-o-plus'),
                
            Actions\Action::make('download_template')
                ->label('Template Import')
                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->action(function () {
                    return Excel::download(
                        new ProfilLegalitasItemTemplateExport(),
                        'template-import-legalitas.xlsx'
                    );
                })
                ->tooltip('Unduh template Excel untuk panduan import'),
                
            Actions\Action::make('import')
                ->label('Import Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('warning')
                ->form([
                    FileUpload::make('file')
                        ->label('File Excel / CSV')
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                            'text/csv',
                        ])
                        ->maxSize(5120)
                        ->required()
                        ->helperText('Format: .xlsx atau .csv. Data akan ditambahkan ke tabel yang sudah ada.'),
                ])
                ->action(function (array $data): void {
                    try {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new ProfilLegalitasItemImport(), $filePath);

                        Notification::make()
                            ->title('Import Berhasil')
                            ->body('Data Legalitas berhasil diimport dari file Excel.')
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Import Gagal')
                            ->body('Terjadi kesalahan: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                })
                ->modalHeading('Import Data Legalitas')
                ->modalSubmitActionLabel('Import Sekarang')
                ->modalIcon('heroicon-o-arrow-up-tray'),

            Actions\Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return Excel::download(
                        new ProfilLegalitasItemExport(),
                        'legalitas-perusahaan-' . now()->format('Y-m-d') . '.xlsx'
                    );
                })
                ->tooltip('Unduh semua data Legalitas ke file Excel'),
        ];
    }
}
