<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/uwu', function () {
//     return "Hemlo boi~";
// });
Route::get('/','MoviesController@index')->name('index');
Route::get('create','MoviesController@create')->name('create');
Route::post('store',['uses' => 'MoviesController@store','as' => 'store']);
Route::get('/movie/{id}',['uses' => 'MoviesController@show','as' => 'show']);
Route::get('/movie/edit/{id}',['uses' => 'MoviesController@edit','as' => 'edit']);
Route::post('update',['uses' => 'MoviesController@update','as' => 'update']);
Route::get('/destroy/{id}',['uses' => 'MoviesController@destroy','as' => 'destroy']);
Route::resource('actors', 'ActorsController');