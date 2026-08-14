<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class CustomLogin extends BaseLogin
{
    /**
     * Ubah tulisan judul (Heading) di sini
     */
    public function getHeading(): string | Htmlable
    {
        return 'Selamat Datang'; 
    }

    /**
     * Ubah tulisan sub-judul di bawah judul (opsional)
     */
    public function getSubheading(): string | Htmlable | null
    {
        return 'Silakan masuk ke akun Anda.';
    }

    /**
     * Ubah tulisan label input form (Email, Password, Remember me) di sini
     */
    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent()->label('Alamat Email'),
                $this->getPasswordFormComponent()->label('Kata Sandi'),
                $this->getRememberFormComponent()->label('Ingat saya'),
            ])
            ->statePath('data');
    }
}
