<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
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
        $roleAlumno = Role::where('slug', 'alumno')->firstOrFail();
        $roleProfesor = Role::where('slug', 'profesor')->firstOrFail();

        //Definicion de un admin fijo
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'fechaNac' => Carbon::now(),
        ]);
        $admin->roles()->sync($roleAdmin);

        //Definicion de un registrador fijo
        $registrador = User::create([
            'name' => 'Regis',
            'email' => 'regis@regis.com',
            'password' => Hash::make('regis1234'),
            'fechaNac' => Carbon::now(),
        ]);
        $registrador->roles()->sync($roleRegis);
        
        //Definicion de los alumnos fijos
        $leandro = User::create([
            'name' => 'Leandro Radins',
            'email' => 'leandroradins@hotmail.com',
            'password' => Hash::make('Leandro1234'),
            'fechaNac' => Carbon::createFromDate(1997, 03 , 25),
        ]);
        $leandro->roles()->sync($roleAlumno);
        
        $matias = User::create([
            'name' => 'Matias Nuñez',
            'email' => 'matusalemn@gmail.com',
            'password' => Hash::make('Matias1234'),
            'fechaNac' => Carbon::createFromDate(1997, 03 , 23),
        ]);
        $matias->roles()->sync($roleAlumno);
        
        //Definicion de un profesor fijo
        $profesor = User::create([
            'name' => 'Claudio Biale',
            'email' => 'claudio.biale@gmail.com',
            'password' => Hash::make('Profesor1234'),
            'fechaNac' => Carbon::now(),
        ]);
        $profesor->roles()->sync($roleProfesor);


        //Alumnos aleatorios
        $alumnos = factory(App\User::class, 20)->create();

        foreach ($alumnos as $alumno) {
            $alumno->assignRoles('alumno');
        }
        
        //Profesores aleatorios
        $profesores = factory(App\User::class, 10)->create();

        foreach ($profesores as $profesor) {
            $profesor->assignRoles('profesor');
        }
    }
}
