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
    }
}
