<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        
        //Menus
        DB::table('menus')->insert([
            'nombre' => 'Orden de Servicio',
            'icono' => 'fas fa-hand-holding',
            'url' => 'servicio',
            'orden' => 1,
        ]);
        DB::table('menus')->insert([
            'nombre' => 'Maestros',
            'icono' => 'fa fa-user',
            'url' => 'maestros',
            'orden' => 2,
        ]);
        DB::table('menus')->insert([
            'nombre' => 'Reportes',
            'icono' => 'fa fa-file',
            'url' => 'reportes',
            'orden' => 3,
        ]);
        DB::table('menus')->insert([
            'nombre' => 'Configuracion',
            'icono' => 'fas fa-cog',
            'url' => 'configuracion',
            'orden' => 4,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 1,
            'nombre' => 'Orden de Servicio',
            'icono' => 'fas fa-hand-holding',
            'url' => 'servicio',
            'orden' => 1,
        ]);

        //Maestros
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Clientes',
            'icono' => 'fa fa-user',
            'url' => 'clientes',
            'orden' => 1,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Supervisores',
            'icono' => 'fas fa-user-tie',
            'url' => 'supervisores',
            'orden' => 2,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Ingenios',
            'icono' => 'fa fa-flask',
            'url' => 'ingenios',
            'orden' => 3,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Tarifarios',
            'icono' => 'far fa-calendar-alt',
            'url' => 'tarifarios',
            'orden' => 4,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Lineas de Productos',
            'icono' => 'fas fa-shopping-basket',
            'url' => 'lineasprod',
            'orden' => 5,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Modos de Pago',
            'icono' => 'fas fa-money-check-alt',
            'url' => 'metpagos',
            'orden' => 6,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Estados de Pago',
            'icono' => 'fab fa-bitcoin',
            'url' => 'estpagos',
            'orden' => 7,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Tipos de Servicios',
            'icono' => 'fas fa-hand-holding-heart',
            'url' => 'tiposserv',
            'orden' => 8,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Designaciones',
            'icono' => 'far fa-calendar-alt',
            'url' => 'designaciones',
            'orden' => 9,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Almacenes',
            'icono' => 'fas fa-warehouse',
            'url' => 'almacenes',
            'orden' => 10,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Unidades',
            'icono' => 'fas fa-box-open',
            'url' => 'unidades',
            'orden' => 11,
        ]);

        //Configuracion
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Usuarios',
            'icono' => 'fa fa-user',
            'url' => 'usuarios',
            'orden' => 1,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Roles',
            'icono' => 'fa fa-users',
            'url' => 'roles',
            'orden' => 2,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Funciones del Rol',
            'icono' => 'fas fa-bars',
            'url' => 'funcionrol',
            'orden' => 3,
        ]);

        //Roles
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Supervisor',
        ]);

        //USUARIO
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'webmaster@mcdigitalperu.com',
            'password' => Hash::make('12345678'),
            'rol_id' => 1,
        ]);

        //Estados del Pago
        DB::table('estados_pagos')->insert([
            'nombre' => 'Pendiente',
        ]);
        DB::table('estados_pagos')->insert([
            'nombre' => 'Pagado',
        ]);

        //ACCESOS PERFIL ADMINISTRADOR
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '2',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '3',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '4',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '5',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '6',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '7',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '8',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '9',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '10',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '11',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '2',
            'sub_menu_id' => '12',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '4',
            'sub_menu_id' => '11',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '4',
            'sub_menu_id' => '12',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '4',
            'sub_menu_id' => '13',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        
        //TIPOS DE TRANSPORTE
        DB::table('tipo_servicios')->insert([
            'nombre' => 'CARGA'
        ]);
        DB::table('tipo_servicios')->insert([
            'nombre' => 'DESCARGA'
        ]);
        DB::table('tipo_servicios')->insert([
            'nombre' => 'ENCARPADO'
        ]);
        
    }
}
