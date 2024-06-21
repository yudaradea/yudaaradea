<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $userRole = Role::create([
            'name' => 'user'
        ]);

        $userAdmin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);

        User::factory(50)->create()->each(function($user){
            $user->assignRole('user');
        });

        // $user->assignRole($userRole);

        $userAdmin->assignRole($adminRole);
    }
}
