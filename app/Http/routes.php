<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\HTML;

Route::get('/', function () {
	   return view('dashboard.index');
});
Route::get('orders',function(){
	return view('dashboard.orders');
});
Route::get('users',function(){
	return view('dashboard.users');
});
Route::get('hire',function(){
	return view('dashboard.users');
});

Route::get('login',function(){

	return view('dashboard.login');

});