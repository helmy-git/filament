<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Translate::make()
                    ->schema([
                        TextInput::make('name'),
                    ]),
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('EN')->schema([
                            TextInput::make('name.en')->label('Name (EN)'),
                        ]),
                        Tab::make('AR')->schema([
                            TextInput::make('name.ar')->label('Name (AR)'),
                        ]),
                    ]),
                Textarea::make('description'),
            ]);
    }
}
