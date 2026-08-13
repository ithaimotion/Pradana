<?php

namespace App\Filament\Resources\KeluhanBandingSubmissions;

use App\Filament\Resources\KeluhanBandingSubmissions\Pages\CreateKeluhanBandingSubmission;
use App\Filament\Resources\KeluhanBandingSubmissions\Pages\EditKeluhanBandingSubmission;
use App\Filament\Resources\KeluhanBandingSubmissions\Pages\ListKeluhanBandingSubmissions;
use App\Filament\Resources\KeluhanBandingSubmissions\Schemas\KeluhanBandingSubmissionForm;
use App\Filament\Resources\KeluhanBandingSubmissions\Tables\KeluhanBandingSubmissionsTable;
use App\Models\KeluhanBandingSubmission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KeluhanBandingSubmissionResource extends Resource
{
    protected static ?string $model = KeluhanBandingSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KeluhanBandingSubmissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeluhanBandingSubmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKeluhanBandingSubmissions::route('/'),
            'create' => CreateKeluhanBandingSubmission::route('/create'),
            'edit' => EditKeluhanBandingSubmission::route('/{record}/edit'),
        ];
    }
}
