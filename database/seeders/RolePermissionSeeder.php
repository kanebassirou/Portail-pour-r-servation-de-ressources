<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                // Création de rôles
                $roleAdmin = Role::create(['name' => 'admin']);
                $roleUser = Role::create(['name' => 'user']);

                // Création de permissions
                $permUserView = Permission::create(['name' => 'view user']);
                $permUserEdit = Permission::create(['name' => 'edit user']);

                // Assigner les permissions au rôle admin
                $roleAdmin->givePermissionTo($permUserView);
                $roleAdmin->givePermissionTo($permUserEdit);

                // Assigner une permission au rôle user
                $roleUser->givePermissionTo($permUserView);
    }
}
