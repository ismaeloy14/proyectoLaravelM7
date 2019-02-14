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
            //$table->increments('id_ActorMovie');
            $table->integer('id_actor')->unsigned();
            $table->foreign('id_actor')->references('id')->on('actors');

            $table->integer('id_movie')->unsigned();
            $table->foreign('id_movie')->references('id')->on('movies');
            
            $table->string('nom_personatge');

            $table->primary(array('id_actor','id_movie'));
            
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
