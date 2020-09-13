<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Super usuario del sistema',
            'special' => 'all-access',
        ]);

        $regis = Role::create([
            'name' => 'Registrador',
            'slug' => 'regis',
            'description' => 'Usuario registrador del sistema',
        ]);
        $permisRegis = Permission::where('slug', 'users.create')->firstOrFail();
        $regis->permissions()->sync($permisRegis);
    }
}
