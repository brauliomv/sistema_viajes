<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::insert([
            'name' => 'Gerente de tienda',
        ]);


        User::insert([
            'name' => 'Administrador',
            'email' => 'admin@sys.com',
            'password' => bcrypt('password'),
            'role_id'  => 1,
        ]);
    }
}
