<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache as CacheFacade;
 
class Cache extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    // protected static string $view = 'filament.pages.cache';

    // protected static ?string $navigationGroup = 'Settings';

    // protected static ?string $navigationLabel = 'Cache';

    // protected static ?int $navigationSort = 99;

    // protected static ?string $slug = 'cache';

    public $defaultAction = 'onboarding';
    public function getHeaderWidgetsColumns(): int|array
    {
        return 3;
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         StatsOverviewWidget::class
    //     ];
    // }
    public function getTitle(): string
    {
        return 'Cache Management';
    }

    public function getHeading(): string
    {
        return 'Cache Management';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('clearAllCaches')
                ->label('Clear All Caches')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Clear All Caches')
                ->modalDescription('This will clear all application caches including config, route, view, and data caches.')
                ->modalSubmitActionLabel('Yes, Clear All')
                ->action(function () {
                    $this->clearAllCaches();
                }),
            Action::make('clearCache')
                ->label('Clear Cache')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Clear Cache')
                ->modalDescription('This will clear the application cache.')
                ->modalSubmitActionLabel('Yes, Clear')
                ->action(function () {
                    $this->clearCache();
                }),
            Action::make('clearConfigCache')
                ->label('Clear Config Cache')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Clear Config Cache')
                ->modalDescription('This will clear the config cache.')
                ->modalSubmitActionLabel('Yes, Clear')
                ->action(function () {
                    $this->clearConfigCache();
                }),
            Action::make('clearRouteCache')
                ->label('Clear Route Cache')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Clear Route Cache')
                ->modalDescription('This will clear the route cache.')
                ->modalSubmitActionLabel('Yes, Clear')
                ->action(function () {
                    $this->clearRouteCache();
                }),
            Action::make('clearViewCache')
                ->label('Clear View Cache')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Clear View Cache')
                ->modalDescription('This will clear the view cache.')
                ->modalSubmitActionLabel('Yes, Clear')
                ->action(function () {
                    $this->clearViewCache();
                }),
            Action::make('optimizeApplication')
                ->label('Optimize Application')
                ->icon('heroicon-o-wrench')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Optimize Application')
                ->modalDescription('This will optimize the application by clearing caches and compiling assets.')
                ->modalSubmitActionLabel('Yes, Optimize')
                ->action(function () {
                    $this->optimizeApplication();
                }),
        ];
    }

    public function clearCache(): void
    {
        try {
            Artisan::call('cache:clear');

            Notification::make()
                ->title('Success!')
                ->body('Application cache cleared successfully.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to clear cache: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearConfigCache(): void
    {
        try {
            Artisan::call('config:clear');

            Notification::make()
                ->title('Success!')
                ->body('Config cache cleared successfully.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to clear config cache: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearRouteCache(): void
    {
        try {
            Artisan::call('route:clear');

            Notification::make()
                ->title('Success!')
                ->body('Route cache cleared successfully.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to clear route cache: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearViewCache(): void
    {
        try {
            Artisan::call('view:clear');

            Notification::make()
                ->title('Success!')
                ->body('View cache cleared successfully.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to clear view cache: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function clearAllCaches(): void
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('optimize:clear');
            CacheFacade::flush();

            Notification::make()
                ->title('Success!')
                ->body('All caches cleared successfully!')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to clear caches: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function optimizeApplication(): void
    {
        try {
            Artisan::call('optimize');

            Notification::make()
                ->title('Success!')
                ->body('Application optimized successfully!')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Failed to optimize application: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }
}