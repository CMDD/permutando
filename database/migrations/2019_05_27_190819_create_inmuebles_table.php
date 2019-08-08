<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('tipo_publicacion')->nullable();
            $table->string('tipo_inmueble')->nullable();
            $table->string('estado')->nullable();
            $table->text('caracteristicas')->nullable();

            // Casa - Apartamento
            $table->string('video')->nullable();
            $table->string('area')->nullable();
            $table->string('departamento')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('estrato')->nullable();

            
            //Bodega
            $table->string('carga_psi')->nullable();
            $table->string('capacidad_luz')->nullable();
            $table->boolean('parque_industrial')->nullable();
            $table->string('habitaciones')->nullable();
            $table->string('banos')->nullable();
            //Lote
            $table->string('topografia')->nullable();
            $table->string('vias')->nullable();

            // Oficina
            $table->string('espacio')->nullable();

            // Edificio
            $table->string('area_construida')->nullable();
            $table->string('area_lote')->nullable();
            $table->string('pisos')->nullable();
            $table->boolean('ascensor')->nullable();

            $table->boolean('balcon')->nullable();
            $table->boolean('terraza')->nullable();
            $table->boolean('parqueadero')->nullable();
            $table->string('porteria')->nullable();
            $table->string('patio')->nullable();
           
            $table->string('valor')->nullable();
            $table->text('mas_informacion')->nullable();
            $table->string('imagen')->nullable();
            // Usuario
            $table->string('username')->nullable();
            $table->string('useremail')->nullable();
            $table->string('usertel')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->integer('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')
                  ->references('id')
                  ->on('departamentos')
                  ->onDelete('cascade');

            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->foreign('ciudad_id')
                  ->references('id')
                  ->on('ciudads')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('inmuebles');
    }
}
