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

Route::get('/', 'UserController@index')->middleware('auth');

Auth::routes();

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('team.show', 'TeamController@show');
	Route::get('team/add', 'TeamController@add');
	// Route::get('/create', 'SalesRepController');

	Route::resource('sales3', 'SalesRepController');
	Route::resource('sales2', 'SupervisorController');
	Route::resource('sales1', 'ManagerController');
	Route::resource('team', 'TeamController');
});

