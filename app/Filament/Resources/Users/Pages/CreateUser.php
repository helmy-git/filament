<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function afterCreate(): void
    {
        $roleNames = \Spatie\Permission\Models\Role::whereIn('id', $this->data['roles'] ?? [])->pluck('name')->toArray();
        $permissionNames = \Spatie\Permission\Models\Permission::whereIn('id', $this->data['permissions'] ?? [])->pluck('name')->toArray();

        $this->record->syncRoles($roleNames);
        $this->record->syncPermissions($permissionNames);
    }
}
