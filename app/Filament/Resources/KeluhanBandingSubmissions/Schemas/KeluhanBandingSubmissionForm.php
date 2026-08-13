<?php

namespace App\Filament\Resources\KeluhanBandingSubmissions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class KeluhanBandingSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('telepon')
                    ->tel(),
                Select::make('jenis')
                    ->options(['keluhan' => 'Keluhan', 'banding' => 'Banding'])
                    ->required(),
                Textarea::make('pesan')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ])
                    ->default('pending')
                    ->required(),
                Textarea::make('catatan_admin')
                    ->columnSpanFull(),
                TextInput::make('nama_perusahaan'),
                TextInput::make('kota'),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                TextInput::make('telepon_perusahaan')
                    ->tel(),
                TextInput::make('email_perusahaan')
                    ->email(),
                TextInput::make('nama_perwakilan'),
                TextInput::make('jabatan'),
                TextInput::make('telepon_perwakilan')
                    ->tel(),
                TextInput::make('email_perwakilan')
                    ->email(),
                TextInput::make('path_dokumen'),
            ]),
            ]);
    }
}
