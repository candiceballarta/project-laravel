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
            $table->foreign('producer_id')->references('producer_id')->on('producers')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->increments('actor_id');
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('notes',50);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
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
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('rating_id');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('score',45);
            $table->timestamps();
        });

        Schema::create('movie_ratings', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->integer('rating_id')->unsigned();
            $table->foreign('rating_id')->references('rating_id')->on('ratings')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('movies');
        Schema::dropIfExists('actors');
        Schema::dropIfExists('movie_genres');
        Schema::dropIfExists('movie_ratings');
        Schema::dropIfExists('producers');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('genre');
        Schema::dropIfExists('ratings');
        
    }
}
