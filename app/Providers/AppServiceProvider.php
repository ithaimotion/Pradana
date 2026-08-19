<?php

namespace App\Providers;

use App\Models\Logo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Jika aplikasi berjalan di mode production (di hosting Domainesia / cPanel)
        // Kita ubah path public bawaan Laravel menjadi public_html
        if ($this->app->environment('production')) {
            $this->app->bind('path.public', function() {
                return base_path('../public_html');
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production' || str_contains(request()->url(), 'https://')) {
            URL::forceScheme('https');
        }
        try {
            $logos = Logo::where('aktif', true)->orderBy('urutan')->get();
        } catch (\Throwable $e) {
            $logos = collect();
        }

        View::share('logos', $logos);

        // Global AI configuration for all Textarea and RichEditor fields
        $configureAi = function ($component) {
            $component->hintAction(
                \Filament\Forms\Components\Actions\Action::make('generate_ai')
                    ->label('✨ AI')
                    ->icon('heroicon-m-sparkles')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('prompt')
                            ->label('Perintah untuk AI')
                            ->required()
                            ->placeholder('Ketikkan perintah Anda di sini...'),
                    ])
                    ->action(function (array $data, \Filament\Forms\Set $set) use ($component) {
                        $generated = \App\Services\GeminiService::generateText($data['prompt']);
                        if (str_starts_with($generated, 'Error:')) {
                            \Filament\Notifications\Notification::make()
                                ->title('Gagal Generate')
                                ->body($generated)
                                ->danger()
                                ->send();
                        } else {
                            // Automatically set the value to the current component's state path
                            $set($component->getName(), $generated);
                            \Filament\Notifications\Notification::make()
                                ->title('Teks berhasil di-generate!')
                                ->success()
                                ->send();
                        }
                    })
            );
        };

        \Filament\Forms\Components\Textarea::configureUsing($configureAi);
        \Filament\Forms\Components\RichEditor::configureUsing($configureAi);
    }
}
