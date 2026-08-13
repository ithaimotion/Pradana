<?php

namespace App\Filament\Resources\KeluhanBandingSubmissions\Pages;

use App\Filament\Resources\KeluhanBandingSubmissions\KeluhanBandingSubmissionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKeluhanBandingSubmission extends EditRecord
{
    protected static string $resource = KeluhanBandingSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
