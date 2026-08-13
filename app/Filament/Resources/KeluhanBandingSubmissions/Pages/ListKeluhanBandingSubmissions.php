<?php

namespace App\Filament\Resources\KeluhanBandingSubmissions\Pages;

use App\Filament\Resources\KeluhanBandingSubmissions\KeluhanBandingSubmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKeluhanBandingSubmissions extends ListRecords
{
    protected static string $resource = KeluhanBandingSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
