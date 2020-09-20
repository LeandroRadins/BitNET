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
            'slug' => 'ADMIN',
            'description' => 'Super usuario del sistema',
            'special' => 'all-access',
        ]);

        $regis = Role::create([
            'name' => 'Registrador',
            'slug' => 'REGIS',
            'description' => 'Usuario registrador del sistema',
        ]);
        
        $alumno = Role::create([
            'name' => 'Alumno',
            'slug' => 'ALUMNO',
            'description' => 'Alumno de la universidad',
        ]);
        
        $profesor = Role::create([
            'name' => 'Profesor',
            'slug' => 'PROFESOR',
            'description' => 'Profesor de la universidad',
        ]);

        $regis->syncPermissions('users.create', 'users.index' ,'temas.index', 'preguntas.index', 'respuestas.index');
        $alumno->syncPermissions('temas.index', 'preguntas.index','preguntas.create', 'respuestas.index','respuestas.create');
        $profesor->syncPermissions('temas.index', 'preguntas.index','preguntas.create', 'respuestas.index','respuestas.create');

    }
}
