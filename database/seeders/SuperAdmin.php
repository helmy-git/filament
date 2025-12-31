<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use FilamentShield\Models\Role;
use FilamentShield\Models\Permission;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Super Admin Role
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ], [
            'description' => 'Super Admin with all permissions',
        ]);

        // 2. Get all permissions
        $allPermissions = Permission::all();

        // 3. Assign all permissions to Super Admin Role
        $superAdminRole->syncPermissions($allPermissions);

        // 4. Create admin user
        $adminUser = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('123456'),
        ]);

        // 5. Assign Super Admin Role to admin user
        $adminUser->assignRole($superAdminRole);

        $this->command->info('Super Admin role and admin user created successfully.');
    }
}
