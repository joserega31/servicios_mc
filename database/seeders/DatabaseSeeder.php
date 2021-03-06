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
            'parametros'  => 0,
            'orden' => 1,
        ]);

        //Maestros
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Clientes',
            'icono' => 'fa fa-user',
            'url' => 'clientes',
            'parametros'  => 0,
            'orden' => 1,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Supervisores',
            'icono' => 'fas fa-user-tie',
            'url' => 'supervisores',
            'parametros'  => 0,
            'orden' => 2,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Ingenios',
            'icono' => 'fa fa-flask',
            'url' => 'ingenios',
            'parametros'  => 0,
            'orden' => 3,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Tarifarios',
            'icono' => 'far fa-calendar-alt',
            'url' => 'tarifarios',
            'parametros'  => 0,
            'orden' => 4,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Lineas de Productos',
            'icono' => 'fas fa-shopping-basket',
            'url' => 'lineasprod',
            'parametros'  => 0,
            'orden' => 5,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Modos de Pago',
            'icono' => 'fas fa-money-check-alt',
            'url' => 'metpagos',
            'parametros'  => 0,
            'orden' => 6,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Estados de Pago',
            'icono' => 'fab fa-bitcoin',
            'url' => 'estpagos',
            'parametros'  => 0,
            'orden' => 7,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Tipos de Servicios',
            'icono' => 'fas fa-hand-holding-heart',
            'url' => 'tiposserv',
            'parametros'  => 0,
            'orden' => 8,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Designaciones',
            'icono' => 'far fa-calendar-alt',
            'url' => 'designaciones',
            'parametros'  => 0,
            'orden' => 9,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Almacenes',
            'icono' => 'fas fa-warehouse',
            'url' => 'almacenes',
            'parametros'  => 0,
            'orden' => 10,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 2,
            'nombre' => 'Unidades',
            'icono' => 'fas fa-box-open',
            'url' => 'unidades',
            'parametros'  => 0,
            'orden' => 11,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 3,
            'nombre' => 'Lista de Clientes',
            'icono' => 'far fa-address-card',
            'url' => 'exportarlstcli',
            'parametros'  => 0,
            'orden' => 1,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 3,
            'nombre' => 'Lista de Supervisores',
            'icono' => 'fas fa-clipboard-list',
            'url' => 'exportarlstsup',
            'parametros'  => 0,
            'orden' => 2,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 3,
            'nombre' => 'Lista de Usuarios',
            'icono' => 'fas fa-user',
            'url' => 'exportarlstuser',
            'parametros'  => 0,
            'orden' => 3,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 3,
            'nombre' => 'Lista de Roles',
            'icono' => 'fas fa-users',
            'url' => 'exportarlstroles',
            'parametros'  => 0,
            'orden' => 4,
        ]);

        DB::table('sub_menus')->insert([
            'menu_id' => 3,
            'nombre' => 'Reporte General',
            'icono' => 'far fa-file-alt',
            'url' => 'exreportegeneral',
            'parametros'  => 1,
            'orden' => 5,
        ]);
        //Configuracion
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Usuarios',
            'icono' => 'fa fa-user',
            'url' => 'usuarios',
            'parametros'  => 0,
            'orden' => 1,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Roles',
            'icono' => 'fa fa-users',
            'url' => 'roles',
            'parametros'  => 0,
            'orden' => 2,
        ]);
        DB::table('sub_menus')->insert([
            'menu_id' => 4,
            'nombre' => 'Funciones del Rol',
            'icono' => 'fas fa-bars',
            'url' => 'funcionrol',
            'parametros'  => 0,
            'orden' => 3,
        ]);

        //Roles
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'crear_utilidad_os' => 1
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Supervisor',
            'crear_utilidad_os' => 0
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
            'menu_id' => '1',
            'sub_menu_id' => '1',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
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
            'sub_menu_id' => '18',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '4',
            'sub_menu_id' => '19',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '4',
            'sub_menu_id' => '20',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        //ACCESO A REPORTES
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '3',
            'sub_menu_id' => '13',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '3',
            'sub_menu_id' => '14',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '3',
            'sub_menu_id' => '15',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '3',
            'sub_menu_id' => '16',
            'crear' => '1',
            'editar' => '1',
            'eliminar' => '1'
        ]);
        DB::table('funcion_roles')->insert([
            'rol_id' => '1',
            'menu_id' => '3',
            'sub_menu_id' => '17',
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

        //UNIDADES
        DB::table('unidades')->insert([
            'descripcion_corta' => 'TN',
            'descripcion_larga' => 'TONELADAS'
        ]);
        DB::table('unidades')->insert([
            'descripcion_corta' => 'CJ',
            'descripcion_larga' => 'CAJA'
        ]);
        DB::table('unidades')->insert([
            'descripcion_corta' => 'CR',
            'descripcion_larga' => 'CARRO'
        ]);

        //INGENIOS
        DB::table('ingenios')->insert([
            'nombre' => 'CAÑA BRAVA'
        ]);
        DB::table('ingenios')->insert([
            'nombre' => 'COSTEÑO'
        ]);
        DB::table('ingenios')->insert([
            'nombre' => 'PUNTO BLANCO'
        ]);
        DB::table('ingenios')->insert([
            'nombre' => 'ÁLVARES BOHL'
        ]);

        //ALMACENES
        DB::table('almacenes')->insert([
            'nombre_almacen' => 'PUNTO BLANCO PIURA',
            'ingenios_id' => '3',
        ]);
        DB::table('almacenes')->insert([
            'nombre_almacen' => 'PUNTO BLANCO TUMBES',
            'ingenios_id' => '3',
        ]);

        //MODOS DE PAGO
        DB::table('modo_pagos')->insert([
            'nombre' => 'EFECTIVO'
        ]);
        DB::table('modo_pagos')->insert([
            'nombre' => 'DEPOSITO'
        ]);
        DB::table('modo_pagos')->insert([
            'nombre' => 'CREDITO A 7 DIAS'
        ]);

        //LINEAS DE PRODUCTO
        DB::table('lineas_productos')->insert([
            'nombre' => 'ARROZ'
        ]);
        DB::table('lineas_productos')->insert([
            'nombre' => 'AZUCAR'
        ]);
        DB::table('lineas_productos')->insert([
            'nombre' => 'ABARROTES'
        ]);

        //TARIFARIOS
        DB::table('tarifarios')->insert([
            'nombre' => 'GENERICO',
            'vigente' => '1',
        ]);
    }
}
