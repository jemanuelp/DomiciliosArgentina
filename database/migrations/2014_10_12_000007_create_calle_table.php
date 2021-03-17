<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_domicilio')->create('calles', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('fuente');
            $table->unsignedBigInteger('departamento_id');
            $table->string('nombre');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('localidad_censal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('localidad_censal_id')->references('id')->on('localidades_censales')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pgsql_domicilio.calles');
    }
}
