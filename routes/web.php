<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('movies','MoviesController');
Route::resource('actors', 'ActorsController');
Route::resource('producers', 'ProducersController');
Route::resource('genres', 'GenresController');
Route::resource('ratings', 'RatingsController');
Route::resource('roles', 'RolesController');

Route::get('/movies/restore/{id}',['uses' => 'MoviesController@restore','as' => 'movies.restore']);
Route::get('/actors/restore/{id}',['uses' => 'ActorsController@restore','as' => 'actors.restore']);

Route::get('/contact', 'ContactFormController@create')->name('contact');
Route::post('/contact', 'ContactFormController@store');
Route::get('/admin', ['uses' => 'AdminEmailController@create', 'as' => 'admin.create']);
Route::post('/admin', ['uses' => 'AdminEmailController@store', 'as' => 'admin.store']);
