<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('slug', 'admin')->firstOrFail();
        $roleRegis = Role::where('slug', 'regis')->firstOrFail();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'fechaNac' => Carbon::now(),
        ]);
        $admin->roles()->sync($roleAdmin);


        $registrador = User::create([
            'name' => 'Regis',
            'email' => 'regis@regis.com',
            'password' => Hash::make('regis1234'),
            'fechaNac' => Carbon::now(),
        ]);
        $registrador->roles()->sync($roleRegis);


        factory(App\User::class, 20)->create();
    }
}
