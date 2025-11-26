<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Spatie\Sitemap\SitemapGenerator;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class HeaderSettings extends SettingsPage
{
    use UseShield;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.site.title');
    }

    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->action(fn() => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub'))
                ->color('danger')
                ->label(trans('filament-settings-hub::messages.back')),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['site_description'])) {
            $decoded = json_decode($data['site_description'], true);
            if (is_array($decoded) && isset($decoded['menu'])) {
                $data['menu'] = $decoded['menu'];
            } else {
                $data['menu'] = [];
            }
        } else {
            $data['menu'] = [];
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $storageData = [];

        if (isset($data['menu'])) {
            $storageData['menu'] = $data['menu'];
        }

        $data['site_description'] = json_encode($storageData);

        unset($data['menu']);

        return $data;
    }

     protected function processSettingsData(array $data): array
    {
        $processed = [];

        foreach ($data as $key => $value) {
            if ($key === 'menu') {
                continue;
            }

            if (is_array($value) && $this->isTranslatableField($value)) {
                $processed[$key] = $value;
            }
            elseif (is_array($value)) {
                $processed[$key] = $value;
            }
            else {
                $processed[$key] = $value;
            }
        }

        return $processed;
    }

    protected function isTranslatableField(array $value): bool
    {
        $locales = config('app.locales', ['en', 'ar', 'fr']);

        if (empty($value)) {
            return false;
        }

        foreach (array_keys($value) as $key) {
            if (!in_array($key, $locales)) {
                return false;
            }
        }

        return true;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(trans('filament-settings-hub::messages.settings.site.site_seo'))
                    ->description(trans('filament-settings-hub::messages.settings.site.site_name_description'))
                    ->schema([
                        Translate::make()
                            ->schema([
                                Repeater::make('menu')
                                    ->schema([
                                        TextInput::make('text')
                                            ->required()
                                            ->label(trans('filament-settings-hub::messages.settings.site.form.text'))
                                            ->columnSpan(2)
                                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("menu")' : null),
                                        TextInput::make('url')
                                            ->required()
                                            ->label(trans('filament-settings-hub::messages.settings.site.form.url'))
                                            ->columnSpan(2)
                                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("menu")' : null),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->collapsible()
                                    ->reorderable()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
                                    ->addActionLabel('Add Menu Item'),
                            ]),
                    ])
                    ->columns(2),
                    
                Section::make(trans('filament-settings-hub::messages.settings.site.site_images'))
                    ->description(trans('filament-settings-hub::messages.settings.site.site_logo_description'))
                    ->schema([
                        Translate::make()
                            ->schema([
                                FileUpload::make('site_profile')
                                    ->disk(config('filament-settings-hub.upload.disk'))
                                    ->directory(config('filament-settings-hub.upload.directory'))
                                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_profile'))
                                    ->columnSpan(2)
                                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_profile")' : null),
                            ]),
                        FileUpload::make('site_logo')
                            ->disk(config('filament-settings-hub.upload.disk'))
                            ->directory(config('filament-settings-hub.upload.directory'))
                            ->label(trans('filament-settings-hub::messages.settings.site.form.site_logo'))
                            ->columnSpan(2)
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_logo")' : null),
                    ])
                    ->columns(2),
            ])
            ->columns(1);
    }
}