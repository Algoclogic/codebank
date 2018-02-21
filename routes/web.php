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
    return view('welcome');
});

Route::get('user/details',[

		'as' => 'user.home',
		'uses' => 'User\UserController@index',
	]);
Route::post('user/details',[

		'as' => 'user.detail',
		'uses' => 'User\UserController@add',
	]);
Route::get('user/update',[

		'as' => 'user.update',
		'uses' => 'User\UserController@update',
	]);
Route::post('user/update',[

		'as' => 'user.detail.update',
		'uses' => 'User\UserController@updateDetail',
	]);
Route::get('user/delete/',[

		'as' => 'user.delet',
		'uses' => 'User\UserController@delet',
	]);

// FinanceApi routes

Route::get('finance/api',[
	'as' => 'finance.api',
	'uses' => 'FinanceController@index',
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard',[
	'as' => 'dashboard',
	'uses' => 'CodeBank\DashboardController@index',
]);
Route::post('search/question',[
	'as' => 'search.question',
	'uses' => 'CodeBank\DashboardController@search'
]);
