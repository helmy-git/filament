<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;

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
            $locales = Cache::remember('active_languages', 0, fn() => Language::active()->orderBy('order')->pluck('code')->toArray());
        } catch (\Exception $e) {
            $locales = ['en', 'ar'];
        }
        LanguageSwitch::configureUsing(fn(LanguageSwitch $switch) => $switch->locales($locales)
            ->flags([])

            ->visible(outsidePanels: true));
    }
}
