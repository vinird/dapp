<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombreEvento');
            $table->integer('fechaInicio');
            $table->integer('fechaFinal');
            $table->tinyInteger('tipoVoto');
            $table->tinyInteger('opcionVoto');
            $table->tinyInteger('avance');
            $table->tinyInteger('correosAsignados')->nullable();
            $table->tinyInteger('estado')->default(0);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('eventos');
    }
}
