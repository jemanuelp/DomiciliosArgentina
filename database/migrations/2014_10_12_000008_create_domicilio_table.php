<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_domicilio')->create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calle_id');
            $table->string('calle');
            $table->integer('numero');
            $table->string('piso');
            $table->string('block');
            $table->string('codigo_postal');
            $table->integer('departamento');
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('localidad_censal_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('localidad_censal_id')->references('id')->on('localidades_censales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on(((env('DB_CONNECTION') == 'pgsql') ? 'gestion_usuarios.' : '').'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on(((env('DB_CONNECTION') == 'pgsql') ? 'gestion_usuarios.' : '').'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on(((env('DB_CONNECTION') == 'pgsql') ? 'gestion_usuarios.' : '').'users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pgsql_domicilio.domicilios');
    }
}
