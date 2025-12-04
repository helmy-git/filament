<?php

namespace App\Filament\Resources\Languages\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        config([
            'filament-translate-field.locales' => $this->getActiveLanguages()
        ]);
    }

    private function getActiveLanguages(): array
    {
        try {
            return Cache::remember('active_languages', 3600, function () {
                return Language::active()
                    ->orderBy('order')
                    ->pluck('code')
                    ->toArray();
            });
        } catch (\Exception $e) {
            return ['en', 'ar'];
        }
    }
}