<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profil Anda')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        $this->getNameFormComponent(),
                                        $this->getEmailFormComponent(),
                                        $this->getPasswordFormComponent(),
                                        $this->getPasswordConfirmationFormComponent(),
                                    ])->columnSpan(2),

                                Grid::make(1)
                                    ->schema([
                                        FileUpload::make('avatar_url')
                                            ->label('Foto Profil (Avatar)')
                                            ->avatar()
                                            ->directory('avatars')
                                            ->image()
                                            ->maxSize(2048)
                                            ->alignCenter(),
                                    ])->columnSpan(1),
                            ]),
                    ]),
            ]);
    }
}
