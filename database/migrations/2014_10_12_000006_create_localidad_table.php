<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_domicilio')->create('localidades', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('fuente');
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->string('nombre');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('localidad_censal_id');
            $table->string('funcion')->nullable();
            $table->unsignedBigInteger('centroide_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('localidad_censal_id')->references('id')->on('localidades_censales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('centroide_id')->references('id')->on('centroides')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pgsql_domicilio.localidades');
    }
}
