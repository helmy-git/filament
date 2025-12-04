<?php

namespace App\Filament\Resources\Languages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
class LanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        // protected $fillable = ['code', 'name', 'is_active', 'order']; 

        return $schema
            ->components([
                TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100),
            ]);
    }
}
