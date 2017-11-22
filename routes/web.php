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
    return view('login');
});

Route::get('/login', 'LoginController@view');
Route::post('/login', 'LoginController@loggedin');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@registered');

Route::group(['middleware' => ['login']], function () {

	Route::get('/home', 'HomeController@index');
	Route::get('/income/new', 'IncomeController@index');
	Route::post('/income', 'IncomeController@create');
	Route::get('/expense/new', 'ExpenseController@index');
	Route::post('/expense', 'ExpenseController@create');

});

Route::get('/logout', 'Login\LoginController@logout');