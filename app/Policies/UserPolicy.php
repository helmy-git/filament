<?php

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:User') || $authUser->hasRole('super_admin');
    }

    public function view(AuthUser $authUser): bool
    {
        return $authUser->can('View:User') || $authUser->hasRole('super_admin');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:User') || $authUser->hasRole('super_admin');
    }

    public function update(AuthUser $authUser): bool
    {
        return $authUser->can('Update:User') || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser): bool
    {
        return $authUser->can('Delete:User') || $authUser->hasRole('super_admin');
    }

    public function restore(AuthUser $authUser): bool
    {
        return $authUser->can('Restore:User') || $authUser->hasRole('super_admin');
    }

    public function forceDelete(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDelete:User') || $authUser->hasRole('super_admin');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:User') || $authUser->hasRole('super_admin');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:User') || $authUser->hasRole('super_admin');
    }

    public function replicate(AuthUser $authUser): bool
    {
        return $authUser->can('Replicate:User') || $authUser->hasRole('super_admin');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:User') || $authUser->hasRole('super_admin');
    }

}