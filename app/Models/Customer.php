<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Xentixar\WorkflowManager\Contracts\WorkflowsContract;
use Xentixar\WorkflowManager\Traits\HasWorkflows;
use App\Enums\CustomerStatus;

class Customer extends Model implements WorkflowsContract
{
    use HasWorkflows;
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
