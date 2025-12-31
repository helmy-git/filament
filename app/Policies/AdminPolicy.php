<?php

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Admin') || $authUser->hasRole('super_admin') ;
    }

    public function view(AuthUser $authUser): bool
    {
        return $authUser->can('View:Admin') || $authUser->hasRole('super_admin');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Admin') || $authUser->hasRole('super_admin');
    }

    public function update(AuthUser $authUser): bool
    {
        return $authUser->can('Update:Admin') || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser): bool
    {
        return $authUser->can('Delete:Admin') || $authUser->hasRole('super_admin');
    }

    public function restore(AuthUser $authUser): bool
    {
        return $authUser->can('Restore:Admin') || $authUser->hasRole('super_admin');
    }

    public function forceDelete(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDelete:Admin') || $authUser->hasRole('super_admin');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Admin') || $authUser->hasRole('super_admin');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Admin') || $authUser->hasRole('super_admin');
    }

    public function replicate(AuthUser $authUser): bool
    {
        return $authUser->can('Replicate:Admin') || $authUser->hasRole('super_admin');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Admin') || $authUser->hasRole('super_admin');
    }

}