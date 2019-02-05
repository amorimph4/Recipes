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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::redirect('/', '/recipes');
Route::prefix('recipes')->group(function () {
	Route::get('/', 'HomeController@index')->name('recipes');
	Route::get('/create', 'HomeController@create')->name('recipe.create');
	Route::post('/store', 'HomeController@store')->name('recipe.store');
	Route::get('/edit/{recipe}', 'HomeController@edit')->name('recipe.edit');
	Route::post('/update/{recipe}', 'HomeController@update')->name('recipe.update');
	Route::post('/delete/{recipe}', 'HomeController@destroy')->name('recipe.delete');
});

