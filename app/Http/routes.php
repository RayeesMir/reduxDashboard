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
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

Route::get('/', function () {
	   return view('dashboard.index');
});

Route::get('orders','OrdersListController@design');

Route::get('listOfOrders','OrdersListController@index');

Route::get('users','UserListController@design');

Route::get('ListOfusers','UserListController@index');

Route::post('sendmail','UserListController@getSelectedMail');

Route::post('sendmessage','UserListController@getSelectedNumbers');

Route::post('emailStatus','MandrillCaller@index');

Route::post('messagestatus','SMSApiCaller@index');



	 //file_put_contents(storage_path().'/text.txt', Input::get('mails'));

// // Route::get('sendmail', function() {
//     //return view('dashboard.sendmail');
// });

// Route::get('selectedMails','UserListController@showSelectedMails')->name('selectedMails') ;

Route::get('hire','HireListControllerll@index');


// Route::get('hire',function(){
// 	return view('dashboard.users');
// });

Route::get('login',function(){
	return view('dashboard.login');
});

