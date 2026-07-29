<?php

namespace App\Providers;

use App\Models\Logo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $logos = Logo::where('aktif', true)->orderBy('urutan')->get();
        } catch (\Throwable $e) {
            $logos = collect();
        }

        View::share('logos', $logos);
    }
}
