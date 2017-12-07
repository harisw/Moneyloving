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

Route::get('/login', 'LoginController@view');
Route::post('/login', 'LoginController@loggedin');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@registered');

Route::group(['middleware' => ['login']], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::post('/record/delete', 'HomeController@delete');

	Route::get('/income/new', 'IncomeController@index');
	Route::get('/income/update/{id}', 'IncomeController@chosen');
	Route::post('/income/update', 'IncomeController@update');
	Route::get('/income', 'HomeController@income');
	Route::post('/income', 'IncomeController@create');

	Route::get('/expense/new', 'ExpenseController@index');
	Route::get('/expense/update/{id}', 'ExpenseController@chosen');
	Route::post('/expense/update', 'ExpenseController@update');
	Route::get('/expense', 'HomeController@expense');
	Route::post('/expense', 'ExpenseController@create');
});

Route::get('/logout', 'LoginController@logout');