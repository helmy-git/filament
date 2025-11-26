<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

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

                Tab::make('Roles & Permissions')
                    ->schema([
                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->rules(['array'])
                            ->options(\Spatie\Permission\Models\Role::pluck('name', 'id')->toArray()),

                        Select::make('permissions')
                            ->relationship('permissions', 'name')
                            ->multiple()
                            ->preload()
                            ->rules(['array'])
                            ->options(\Spatie\Permission\Models\Permission::pluck('name', 'id')->toArray())
                    ]),
            ])
        ]);
    }

}
