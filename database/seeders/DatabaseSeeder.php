<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    $user = User::factory(1)->create();

    //    $userRole = Role::findByName('user');

    //    $user->assignRole($userRole);

        // User::factory()->create([
        //     'name' => 'Administrator',
        //     'email' => 'admin@example.com',
        //     'is_admin' => '1',
        // ]);

        $this->call(RolePermissionSeeder::class);
    }
}
