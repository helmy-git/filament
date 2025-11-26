<?php

namespace App\Filament\Resources\Customers\Schemas;

use App\Models\Customer;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;
use Xentixar\WorkflowManager\Forms\Components\StateSelect;
class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Translate::make()
                    ->schema([
                        TextInput::make('name'),
                        Textarea::make('description'),
                    ]),
                // Tabs::make('Translations')
                //     ->tabs([
                //         Tab::make('EN')->schema([
                //             TextInput::make('name.en')->label('Name (EN)'),
                //         ]),
                //         Tab::make('AR')->schema([
                //             TextInput::make('name.ar')->label('Name (AR)'),
                //         ]),
                //     ]),

                StateSelect::make('status')
                    ->setWorkflowForModel(Customer::class)
                    // ->setRole('admin')       // or another role from config
                    ->required(),
            ]);
    }
}
