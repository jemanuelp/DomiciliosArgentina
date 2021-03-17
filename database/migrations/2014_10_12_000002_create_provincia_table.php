<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_domicilio')->create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('fuente');
            $table->string('iso_id');
            $table->string('nombre');
            $table->string('categoria');
            $table->string('iso_nombre');
            $table->unsignedBigInteger('centroide_id');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('pgsql_domicilio.provincias');
    }
}
