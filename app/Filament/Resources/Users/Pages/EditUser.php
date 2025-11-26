<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    protected function afterSave(): void
    {
        $roleNames = \Spatie\Permission\Models\Role::whereIn('id', $this->data['roles'] ?? [])->pluck('name')->toArray();
        $permissionNames = \Spatie\Permission\Models\Permission::whereIn('id', $this->data['permissions'] ?? [])->pluck('name')->toArray();

        $this->record->syncRoles($roleNames);
        $this->record->syncPermissions($permissionNames);
    }

}
