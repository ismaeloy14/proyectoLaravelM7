<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActorMovies', function (Blueprint $table) {
            $table->integer('id_actor');
            $table->foreign('id_actor')->references('id_actor')->on('actor');

            $table->integer('id_movie');
            $table->foreign('id_movie')->references('id')->on('movies');
            
            $table->string('nom_personatge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ActorMovies');
    }
}
