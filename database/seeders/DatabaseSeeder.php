<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre' => 'Servicio',
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
            'nombre' => 'Servicio',
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
            'icono' => 'fa fa-users',
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

        //Estados del Pago
        DB::table('estados_pagos')->insert([
            'nombre' => 'Pendiente',
        ]);
        DB::table('estados_pagos')->insert([
            'nombre' => 'Pagado',
        ]);

    }
}
