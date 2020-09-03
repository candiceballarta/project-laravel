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
            $table->id('producer_id');
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('company',45);
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name',45);
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id');
            $table->string('title', 45);
            $table->mediumText('plot');
            $table->year('year');
            $table->bigInteger('producer_id')->unsigned();
            $table->foreign('producer_id')->references('producer_id')->on('producers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->id('actor_id');
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('notes',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('movie_actors', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('actor_id')->unsigned();
            $table->foreign('actor_id')->references('actor_id')->on('actors')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id('genre_id');
            $table->string('genre_name',45);
            $table->timestamps();
        });

        Schema::create('movie_genres', function (Blueprint $table) {
            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('score',45);
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('movie_ratings', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('rating_id')->unsigned();
            $table->foreign('rating_id')->references('rating_id')->on('ratings')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        
        Schema::dropIfExists('movie_genres');
        Schema::dropIfExists('movie_ratings');
        Schema::dropIfExists('movie_actors');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('actors');
        Schema::dropIfExists('producers');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('ratings');
        
    }
}
