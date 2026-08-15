<?php

namespace App\Providers;

use App\Models\Profil;
use Illuminate\Support\Facades\Schema;
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
        // Bagikan data profil perusahaan ke semua view blade secara otomatis
        View::composer('*', function ($view) {
            if (Schema::hasTable('profils')) {
                $profil = Profil::first();
                $view->with('profil', $profil);
            }
        });
    }
}
