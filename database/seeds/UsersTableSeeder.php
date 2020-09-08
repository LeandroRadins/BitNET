<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Super usuario del sistema',
            'special' => 'all-access',
        ]);
    }

}
