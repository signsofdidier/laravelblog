<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = Role::pluck('id', 'name'); // Haalt een key-value collectie op (bijv. ['admin' => 1, 'subscriber' => 3])
        User::all()->each(function ($user) use ($roles) {
            switch ($user->id) {
                case 1:
                    // Eerste gebruiker krijgt de admin-rol
                    $user->roles()->sync([$roles['admin'] ?? 1]);
                    break;
                case 2:
                    // Tweede gebruiker krijgt de subscriber-rol
                    $user->roles()->sync([$roles['subscriber'] ?? 3]);
                    break;
                default:
                    // Overige gebruikers krijgen 1 tot 3 willekeurige rollen
                    $randomRoles = $roles->random(rand(1, min(3, $roles->count())))->values();
                    $user->roles()->sync($randomRoles);
                    break;
            }
        });
    }
}
