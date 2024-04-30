<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'ROOT',
            'email' => 'root@gmail.com',
            'password' => Hash::make('root.com'),
        ]);

        // Assurez-vous que le rôle existe avant de l'assigner

        $role = Role::firstOrCreate(['name' => 'admin']);
        $user->assignRole($role);

    }
}
