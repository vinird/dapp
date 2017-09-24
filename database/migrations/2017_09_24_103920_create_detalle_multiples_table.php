<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMultiplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_multiples', function (Blueprint $table) {
            $table->integer('multiple_id')->unsigned();
            $table->integer('option_id');
            $table->string('descripcion');
            $table->foreign('multiple_id')->references('evento_id')->on('multiples');

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
        Schema::dropIfExists('detalle_multiples');
    }
}
