<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

          // Vider les tables
    DB::table('role_has_permissions')->delete();
    DB::table('model_has_roles')->delete();
    DB::table('roles')->delete();
    DB::table('permissions')->delete();
        // Création de rôles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleEtudiant = Role::create(['name' => 'Etu']);
        $rolePAT = Role::create(['name' => 'PAT']);
        $rolePER = Role::create(['name' => 'PER']);

        // Création de permissions
        $permUserView = Permission::create(['name' => 'view user']);
        $permUserEdit = Permission::create(['name' => 'edit user']);
        $permReserverRessource = Permission::create(['name' => 'reserver ressource']);
        $permGererRessource = Permission::create(['name' => 'gerer ressource']);

        // Assigner les permissions au rôle admin
        $roleAdmin->givePermissionTo($permUserView);
        $roleAdmin->givePermissionTo($permUserEdit);
        $roleAdmin->givePermissionTo($permReserverRessource);
        $roleAdmin->givePermissionTo($permGererRessource);

        // Assigner des permissions au rôle user
        $roleUser->givePermissionTo($permUserView);

        // Assigner des permissions au rôle étudiant
        $roleEtudiant->givePermissionTo($permReserverRessource);

        // Assigner des permissions au rôle PAT
        $rolePAT->givePermissionTo($permReserverRessource);
        $rolePAT->givePermissionTo($permGererRessource);

        // Assigner des permissions au rôle PER
        $rolePER->givePermissionTo($permGererRessource);
    }
}
