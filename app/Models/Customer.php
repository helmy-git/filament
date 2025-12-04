<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\CustomerStatus;

class Customer extends Model
{
    use HasRoles;
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'status' => CustomerStatus::class,
    ];

    public static function getStates(): string
    {
        return \App\Enums\CustomerStatus::class;
    }
}
