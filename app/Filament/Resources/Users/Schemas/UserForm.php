<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Tabs::make('User Tabs')->tabs([

                Tab::make('User Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')
                            ->password()
                            ->maxLength(255)
                            ->dehydrateStateUsing(
                                fn($state) => filled($state) ? bcrypt($state) : null
                            )
                            ->dehydrated(fn($state) => filled($state))
                            ->label('Password'),
                    ]),
 
            ])
        ]);
    }

}
