<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReputacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reputaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('valor')->nullable();
            $table->bigInteger('respuesta_id')->unsigned()->nullable();
            $table->foreign('respuesta_id')->references('id')->on('respuestas');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('reputaciones');
    }
}
