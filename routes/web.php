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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/movie/{id}','MoviesController@showMovie');

Route::get('/', 'HomeController@getHome');

/*Route::get('/', function () {
    return view('home');
});*/

/*Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return "Logout usuario";
});*/

Route::group(['middleware'=>'auth'], function(){
	Route::get('catalog', 'CatalogController@getIndex');
	Route::get('catalog/create', 'CatalogController@getCreate');
	Route::get('catalog/show/{id}', 'CatalogController@getShow');
	Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
	
	Route::post('catalog/create', 'CatalogController@postCreate');
	Route::put('catalog/edit/{id}', 'CatalogController@putEdit');

	Route::put('catalog/rent/{id}', 'CatalogController@putRent');
	Route::put('catalog/return/{id}', 'CatalogController@putReturn');
	Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');
	
	
});



/*
Route::get('/catalog', 'CatalogController@getIndex');

Route::get('/catalog', function () {
    return view('catalog.index');
});*/

/*Route::get('/catalog/show/{id}', 'CatalogController@getShow');

Route::get('/catalog/show/{id}', function ($id) {
	return view('catalog.show', array('id'=>$id));
});*/

/*Route::get('/catalog/create', 'CatalogController@getCreate');

Route::get('/catalog/create', function () {
	return view('catalog.index');
});*/

/*Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');

Route::get('/catalog/edit/{id}', function ($id) {
	return view('catalog.edit', array('id'=>$id));
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
