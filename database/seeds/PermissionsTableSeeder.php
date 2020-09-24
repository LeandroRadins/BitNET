<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios
        Permission::create([
            'name' => 'Menu de usuarios',
            'slug' => 'roles',
            'description' => 'Permite listar a todos los menues de los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Permite listar a todos los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de usuario',
            'slug' => 'roles.show',
            'description' => 'Permite ver los detalles de un usuario del sistema',
        ]);

        Permission::create([
            'name' => 'Crear roles',
            'slug' => 'roles.create',
            'description' => 'Permite cargar roles al sistema',
        ]);

        Permission::create([
            'name' => 'Editar roles',
            'slug' => 'roles.edit',
            'description' => 'Permite editar los datos de los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar roles',
            'slug' => 'roles.destroy',
            'description' => 'Permite eliminar roles del sistema',
        ]);

        //Permisos de usuarios
        Permission::create([
            'name' => 'Menu de usuarios',
            'slug' => 'users',
            'description' => 'Permite listar a todos los menues de los usuarios del sistema',
        ]);
        
        Permission::create([
            'name' => 'Mi perfil',
            'slug' => 'user.profile',
            'description' => 'Permite ver el perfil del usuario autenticado actualmente',
        ]);
        
        Permission::create([
            'name' => 'Mis preguntas',
            'slug' => 'user.preguntas',
            'description' => 'Permite ver las preguntas realizadas por el usuario',
        ]);
        
        Permission::create([
            'name' => 'Mis respuestas',
            'slug' => 'user.respuestas',
            'description' => 'Permite ver las respuestas realizadas por el usuario',
        ]);

        Permission::create([
            'name' => 'Navegar usuarios',
            'slug' => 'users.index',
            'description' => 'Permite listar a todos los usuarios del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de usuario',
            'slug' => 'users.show',
            'description' => 'Permite ver los detalles de un usuario del sistema',
        ]);

        Permission::create([
            'name' => 'Crear usuarios',
            'slug' => 'users.create',
            'description' => 'Permite cargar usuarios al sistema',
        ]);

        Permission::create([
            'name' => 'Editar usuarios',
            'slug' => 'users.edit',
            'description' => 'Permite editar los datos de los usuarios del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar usuarios',
            'slug' => 'users.destroy',
            'description' => 'Permite eliminar usuarios del sistema',
        ]);

        //Permisos de temas
        Permission::create([
            'name' => 'Menu de temas',
            'slug' => 'temas',
            'description' => 'Permite listar a todos los menues de los temas del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar temas',
            'slug' => 'temas.index',
            'description' => 'Permite listar a todos los temas del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de tema',
            'slug' => 'temas.show',
            'description' => 'Permite ver los detalles de un tema del sistema',
        ]);

        Permission::create([
            'name' => 'Crear temas',
            'slug' => 'temas.create',
            'description' => 'Permite cargar temas al sistema',
        ]);

        Permission::create([
            'name' => 'Editar temas',
            'slug' => 'temas.edit',
            'description' => 'Permite editar los datos de los temas del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar temas',
            'slug' => 'temas.destroy',
            'description' => 'Permite eliminar temas del sistema',
        ]);

        //Permisos de preguntas
        Permission::create([
            'name' => 'Menu de preguntas',
            'slug' => 'preguntas',
            'description' => 'Permite listar a todos los menues de las preguntas del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar preguntas',
            'slug' => 'preguntas.index',
            'description' => 'Permite listar a todas las preguntas del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de una pregunta',
            'slug' => 'preguntas.show',
            'description' => 'Permite ver los detalles de una pregunta del sistema',
        ]);

        Permission::create([
            'name' => 'Crear preguntas',
            'slug' => 'preguntas.create',
            'description' => 'Permite cargar preguntas al sistema',
        ]);

        Permission::create([
            'name' => 'Editar preguntas',
            'slug' => 'preguntas.edit',
            'description' => 'Permite editar los datos de las preguntas del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar preguntas',
            'slug' => 'preguntas.destroy',
            'description' => 'Permite eliminar preguntas del sistema',
        ]);

        //Permisos de respuestas
        Permission::create([
            'name' => 'Menu de respuestas',
            'slug' => 'respuestas',
            'description' => 'Permite listar a todos los menues de las respuestas del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar respuestas',
            'slug' => 'respuestas.index',
            'description' => 'Permite listar a todas las respuestas del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de una respuesta',
            'slug' => 'respuestas.show',
            'description' => 'Permite ver los detalles de una respuesta del sistema',
        ]);

        Permission::create([
            'name' => 'Crear respuestas',
            'slug' => 'respuestas.create',
            'description' => 'Permite cargar respuestas al sistema',
        ]);

        Permission::create([
            'name' => 'Editar respuestas',
            'slug' => 'respuestas.edit',
            'description' => 'Permite editar los datos de las respuestas del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar respuestas',
            'slug' => 'respuestas.destroy',
            'description' => 'Permite eliminar respuestas del sistema',
        ]);

        //Permisos de reputaciones
        Permission::create([
            'name' => 'Menu de reputaciones',
            'slug' => 'reputaciones',
            'description' => 'Permite listar a todos los menues de las reputaciones del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar reputaciones',
            'slug' => 'reputaciones.index',
            'description' => 'Permite listar a todas las reputaciones del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de una respuesta',
            'slug' => 'reputaciones.show',
            'description' => 'Permite ver los detalles de una respuesta del sistema',
        ]);

        Permission::create([
            'name' => 'Crear reputaciones',
            'slug' => 'reputaciones.create',
            'description' => 'Permite cargar reputaciones al sistema',
        ]);

        Permission::create([
            'name' => 'Editar reputaciones',
            'slug' => 'reputaciones.edit',
            'description' => 'Permite editar los datos de las reputaciones del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar reputaciones',
            'slug' => 'reputaciones.destroy',
            'description' => 'Permite eliminar reputaciones del sistema',
        ]);

        //Permisos de materias
        Permission::create([
            'name' => 'Menu de materias',
            'slug' => 'materias',
            'description' => 'Permite listar a todos los menues de las materias del sistema',
        ]);

        Permission::create([
            'name' => 'Navegar materias',
            'slug' => 'materias.index',
            'description' => 'Permite listar a todas las materias del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de una materias',
            'slug' => 'materias.show',
            'description' => 'Permite ver los detalles de una materia del sistema',
        ]);

        Permission::create([
            'name' => 'Crear materias',
            'slug' => 'materias.create',
            'description' => 'Permite cargar materias al sistema',
        ]);

        Permission::create([
            'name' => 'Editar materias',
            'slug' => 'materias.edit',
            'description' => 'Permite editar los datos de las materias del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar materias',
            'slug' => 'materias.destroy',
            'description' => 'Permite eliminar materias del sistema',
        ]);
    }
}
