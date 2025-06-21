<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 - Create roles
        $admin      = Role::create(['name' => 'admin']);
        $provider   = Role::create(['name' => 'provider']);
        $client     = Role::create(['name' => 'client']);

        // 2 - Create permissions
        $permissions = [
            'view-appointments',
            'create-appointments',
            'edit-appointments',
            'delete-appointments',
            'manage-users',
            'manage-services'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // 3 - Assing permissions to roles
        $admin->givePermissionTo(Permission::all());
        $provider->givePermissionTo(['view-appointments', 'edit-appointments', 'manage-services']);
        $client->givePermissionTo(['create-appointments', 'delete-appointments']);

    }

}
