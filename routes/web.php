<?php

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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/recipes', 'PagesController@recipes');
Route::get('/calendar', 'PagesController@calendar');

Route::get('recipe/{recipeid}', 'RecipeController@recipe')->name('recipe');

Route::post('recipe/{recipeid}/comment', 'CommentController@store')->name('commentrecipe');

Route::get('recipe/{recipeid}/comment', 'CommentController@get');

Route::post('delete/{id}', 'CommentController@delete')->name('delete');

Route::get('/login', 'PagesController@login');

Auth::routes();
