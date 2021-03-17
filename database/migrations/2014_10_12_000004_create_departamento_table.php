<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_domicilio')->create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('fuente');
            $table->string('nombre');
            $table->unsignedBigInteger('provincia_id');
            $table->string('categoria');
            $table->unsignedBigInteger('centroide_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('centroide_id')->references('id')->on('centroides')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pgsql_domicilio.departamentos');
    }
}
