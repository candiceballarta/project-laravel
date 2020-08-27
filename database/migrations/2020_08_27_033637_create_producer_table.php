<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('producers', function (Blueprint $table) {
            $table->increments('producer_id');
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('company',45);
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('role_id');
            $table->string('role_name',45);
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('title', 45);
            $table->mediumText('plot');
            $table->year('year');
            $table->integer('producer_id')->unsigned();
            $table->foreign('producer_id')->references('producer_id')->on('producer');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->increments('actor_id');
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('notes',50);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->increments('genre_id');
            $table->string('genre_name',45);
            $table->timestamps();
        });

        Schema::create('movie_genres', function (Blueprint $table) {
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('genre_id')->on('genres');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('rating_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('score',45);
            $table->timestamps();
        });

        Schema::create('movie_ratings', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->integer('rating_id')->unsigned();
            $table->foreign('rating_id')->references('rating_id')->on('ratings');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producer');
    }
}
