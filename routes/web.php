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

Auth::routes();

Route::get('/movie/{id}','MoviesController@showMovie');
Route::get('/', 'HomeController@getHome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
	//Rutas de catalog
	Route::get('catalog', 'CatalogController@getIndex');
	Route::get('catalog/create', 'CatalogController@getCreate');
	Route::get('catalog/show/{id}', 'CatalogController@getShow');
	Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
	
	Route::post('catalog/create', 'CatalogController@postCreate');
	Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
	Route::put('catalog/rent/{id}', 'CatalogController@putRent');
	Route::put('catalog/return/{id}', 'CatalogController@putReturn');

	Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');

	//Rutas de actores

	Route::get('actors/indexActors', 'ActorsController@getIndex');
	Route::get('actors/showActor/{id}', 'ActorsController@getShow');
	Route::get('actors/createActor', 'ActorsController@getCreate');
	Route::get('actors/editActor/{id}', 'ActorsController@getEdit');

	Route::post('actors/createActor', 'ActorsController@postCreate');
	Route::put('actors/editActor/{id}', 'ActorsController@putEdit');
	Route::delete('actors/delete/{id}', 'ActorsController@deleteActor');

	//Rutas de directores

	Route::get('directors/indexDirectors', 'DirectorsController@getIndex');
	Route::get('directors/showDirector/{id}', 'DirectorsController@getShow');
	Route::get('directors/createDirector', 'DirectorsController@getCreate');
	Route::get('directors/editDirector/{id}', 'DirectorsController@getEdit');

	Route::post('directors/createDirector', 'DirectorsController@postCreate');
	Route::put('directors/editDirector/{id}', 'DirectorsController@putEdit');
	Route::delete('directors/delete/{id}', 'DirectorsController@deleteDirector');

	/*Route::get('/exportarMovie', 'CatalogController@exportMovie');
	Route::get('/exportarActors', '@');
	Route::get('/exportarDirectos', '@');*/

});