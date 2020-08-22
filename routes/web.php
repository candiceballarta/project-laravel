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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/uwu', function () {
//     return "Hemlo boi~";
// });


Auth::routes();

Route::resource('movies','MoviesController');
Route::resource('actors', 'ActorsController');
Route::get('/home', 'HomeController@index')->name('home');
