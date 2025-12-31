<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Xentixar\WorkflowManager\Models\Workflow;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkflowPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Workflow') || $authUser->hasRole('super_admin');
    }

    public function view(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('View:Workflow') || $authUser->hasRole('super_admin');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Workflow') || $authUser->hasRole('super_admin');
    }

    public function update(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('Update:Workflow') || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('Delete:Workflow') || $authUser->hasRole('super_admin');
    }

    public function restore(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('Restore:Workflow') || $authUser->hasRole('super_admin');
    }

    public function forceDelete(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('ForceDelete:Workflow') || $authUser->hasRole('super_admin');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Workflow') || $authUser->hasRole('super_admin');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Workflow') || $authUser->hasRole('super_admin');
    }

    public function replicate(AuthUser $authUser, Workflow $workflow): bool
    {
        return $authUser->can('Replicate:Workflow') || $authUser->hasRole('super_admin');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Workflow') || $authUser->hasRole('super_admin');
    }

}