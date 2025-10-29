<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Gunakan gaya pagination Bootstrap 4
        Paginator::useBootstrapFour();

        // Jika proyek kamu pakai Bootstrap 5, ubah jadi:
        // Paginator::useBootstrapFive();
    }
}
