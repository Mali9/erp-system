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

Route::get('/', function () {
    return view('home');
});



//bus
Route::get('/buses','BusesController@show');
Route::get('add_bus_form', 'BusesController@add_form');
Route::post('add_bus_submit', 'BusesController@add_bus_submit');
Route::get('edit_bus/{id}','BusesController@edit_bus_form');
Route::post('edit_bus_submit/{id}','BusesController@edit_bus_submit');
Route::get('delete_bus/{id}','BusesController@delete');

//captains
Route::get('/captains','CaptainsController@show');
Route::get('add_captain_form', 'CaptainsController@add_form');
Route::post('add_captain_submit', 'CaptainsController@add_captain_submit');
Route::get('edit_captain/{id}','CaptainsController@edit_captain_form');
Route::post('edit_captain_submit/{id}','CaptainsController@edit_captain_submit');
Route::get('delete_captain/{id}','CaptainsController@delete');

//Foundations
Route::get('/foundations','FoundationsController@show');
Route::get('add_found_form', 'FoundationsController@add_form');
Route::post('add_found_submit', 'FoundationsController@add_found_submit');
Route::get('edit_found/{id}','FoundationsController@edit_found_form');
Route::post('edit_found_submit/{id}','FoundationsController@edit_found_submit');
Route::get('delete_found/{id}','FoundationsController@delete');

//users
Route::get('active_user/{id}','UsersController@active_user');
Route::get('disactive_user/{id}','UsersController@disactive_user');
Route::get('/users','UsersController@show');
Route::get('/edit_user/{id}','UsersController@edit_user_form');
Route::post('/edit_user_submit/{id}','UsersController@edit_user_submit');
Route::get('delete_user/{id}','UsersController@delete');

//representatives
Route::get('/representatives','RepresentativesController@show');
Route::get('/add_rep_form','RepresentativesController@add_rep_form');
Route::post('/add_rep_submit','RepresentativesController@add_rep_submit');
Route::get('/edit_rep/{id}','RepresentativesController@edit_rep_form');
Route::post('/edit_rep_submit/{id}','RepresentativesController@edit_rep_submit');
Route::get('delete_rep/{id}','RepresentativesController@delete');

//collection points
Route::get('/col_points','Col_pointsController@show');
Route::get('/add_col_form','Col_pointsController@add_col_form');
Route::post('/add_col_submit','Col_pointsController@add_col_submit');
Route::get('/edit_col/{id}','Col_pointsController@edit_col_form');
Route::post('/edit_col_submit/{id}','Col_pointsController@edit_col_submit');
Route::get('delete_col/{id}','Col_pointsController@delete');

//search
Route::get('bus_search','BusesController@search');
Route::get('user_search','UsersController@search');
Route::get('captain_search','CaptainsController@search');
Route::get('found_search','FoundationsController@search');
Route::get('col_search','Col_pointsController@search');
Route::get('rep_search','RepresentativesController@search');


