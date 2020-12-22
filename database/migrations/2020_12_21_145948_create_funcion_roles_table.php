<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->integer('sub_menu_id')->unsigned();
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
            $table->boolean('crear')->nullable();
            $table->boolean('editar')->nullable();
            $table->boolean('eliminar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcion_roles');
    }
}
