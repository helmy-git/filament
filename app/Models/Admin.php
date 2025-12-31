<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use HasRoles;
     protected $guard_name = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Add your logic here
    }
}

