<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Admin Guard ---
        $adminRole = Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'admin',
        ]);

        $adminPermissions = Permission::where('guard_name', 'admin')->get();
        $adminRole->syncPermissions($adminPermissions);

        $adminUser = Admin::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('123456'),
        ]);

        $adminUser->assignRole($adminRole);

        // --- Web Guard ---
        // Create a regular user without roles/permissions for now
        User::firstOrCreate([
            'email' => 'user@example.com',
        ], [
            'name' => 'User',
            'password' => Hash::make('123456'),
        ]);

        $this->command->info('Super Admin role and admin user created successfully.');
    }
}
