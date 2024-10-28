<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'WelcomeController@redirectToMovies');

Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/register', 'AuthController@showRegisterForm')->name('register');
Route::post('/register', 'AuthController@register');

Route::middleware('auth')->group(function () {
    Route::get('/movies', 'MovieController@listMovies')->name('movies.list');
    Route::get('/movies/{id}', 'MovieController@showMovie')->name('movies.show');

    Route::post('/movies/add-favorite', 'MovieController@addFavorite')->name('movies.addFavorite');
    Route::delete('/movies/remove-favorite/{id}', 'MovieController@removeFavorite')->name('movies.removeFavorite');

    Route::get('/favorites', 'MovieController@favorites')->name('movies.favorites');
});
