<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

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

Route::get('/email', function () {
    Mail::to('head@email.com')->send(new WelcomeMail());

    return new WelcomeMail();
});

// Route::get('/uwu', function () {
//     return "Hemlo boi~";
// });


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('movies','MoviesController');
Route::resource('actors', 'ActorsController');
Route::resource('producers', 'ProducersController');
Route::resource('genres', 'GenresController');
Route::resource('ratings', 'RatingsController');
Route::resource('roles', 'RolesController');

