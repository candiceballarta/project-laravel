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
            $table->id();
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('company',45);
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name',45);
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 45);
            $table->mediumText('plot');
            $table->year('year');
            $table->bigInteger('producer_id')->unsigned();
            $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('fname',16);
            $table->string('lname',16);
            $table->string('notes',50);
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre_name',45);
            $table->timestamps();
        });

        Schema::create('movie_genres', function (Blueprint $table) {
            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('score',45);
            $table->timestamps();
        });

        Schema::create('movie_ratings', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->bigInteger('rating_id')->unsigned();
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
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
        Schema::dropIfExists('movies');
        Schema::dropIfExists('actors');
        Schema::dropIfExists('producers');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('ratings');
        
    }
}
