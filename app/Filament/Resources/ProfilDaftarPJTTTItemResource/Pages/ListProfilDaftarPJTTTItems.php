<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;

use App\Exports\ProfilDaftarPJTTTExport;
use App\Exports\ProfilDaftarPJTTTTemplateExport;
use App\Imports\ProfilDaftarPJTTTImport;
use App\Filament\Resources\ProfilDaftarPJTTTItemResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListProfilDaftarPJTTTItems extends ListRecords
{
    protected static string $resource = ProfilDaftarPJTTTItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Tambah data baru
            Actions\CreateAction::make()
                ->label('Tambah Data')
                ->icon('heroicon-o-plus'),

            // Download Template
            Actions\Action::make('download_template')
                ->label('Template Import')
                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->action(function () {
                    return Excel::download(
                        new ProfilDaftarPJTTTTemplateExport(),
                        'template-import-pjt-tt.xlsx'
                    );
                })
                ->tooltip('Unduh template Excel untuk panduan import'),

            // Import
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
                        ->maxSize(5120) // 5MB
                        ->required()
                        ->helperText('Format: .xlsx atau .csv. Gunakan template yang disediakan. Data akan DITAMBAHKAN ke data yang sudah ada.'),
                ])
                ->action(function (array $data): void {
                    try {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new ProfilDaftarPJTTTImport(), $filePath);

                        Notification::make()
                            ->title('Import Berhasil')
                            ->body('Data PJT & TT berhasil diimport dari file Excel.')
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
                ->modalHeading('Import Data PJT & TT dari Excel')
                ->modalSubmitActionLabel('Import Sekarang')
                ->modalIcon('heroicon-o-arrow-up-tray'),

            // Export
            Actions\Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return Excel::download(
                        new ProfilDaftarPJTTTExport(),
                        'daftar-pjt-tt-' . now()->format('Y-m-d') . '.xlsx'
                    );
                })
                ->tooltip('Unduh semua data PJT & TT ke file Excel'),
        ];
    }
}
