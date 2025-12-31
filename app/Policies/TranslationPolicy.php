<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use TomatoPHP\FilamentTranslations\Models\Translation;
use Illuminate\Auth\Access\HandlesAuthorization;

class TranslationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Translation') || $authUser->hasRole('super_admin');
    }

    public function view(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('View:Translation') || $authUser->hasRole('super_admin');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Translation') || $authUser->hasRole('super_admin');
    }

    public function update(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('Update:Translation') || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('Delete:Translation') || $authUser->hasRole('super_admin');
    }

    public function restore(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('Restore:Translation') || $authUser->hasRole('super_admin');
    }

    public function forceDelete(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('ForceDelete:Translation') || $authUser->hasRole('super_admin');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Translation') || $authUser->hasRole('super_admin');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Translation') || $authUser->hasRole('super_admin');
    }

    public function replicate(AuthUser $authUser, Translation $translation): bool
    {
        return $authUser->can('Replicate:Translation') || $authUser->hasRole('super_admin');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Translation') || $authUser->hasRole('super_admin');
    }

}