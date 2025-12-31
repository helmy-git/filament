<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Customer') || $authUser->hasRole('super_admin');
    }

    public function view(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('View:Customer') || $authUser->hasRole('super_admin');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Customer') || $authUser->hasRole('super_admin');
    }

    public function update(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('Update:Customer') || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('Delete:Customer') || $authUser->hasRole('super_admin');
    }

    public function restore(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('Restore:Customer') || $authUser->hasRole('super_admin');
    }

    public function forceDelete(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('ForceDelete:Customer') || $authUser->hasRole('super_admin');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Customer') || $authUser->hasRole('super_admin');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Customer') || $authUser->hasRole('super_admin');
    }

    public function replicate(AuthUser $authUser, Customer $customer): bool
    {
        return $authUser->can('Replicate:Customer') || $authUser->hasRole('super_admin');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Customer') || $authUser->hasRole('super_admin');
    }

}