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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/ticket','TicketController@create');
Route::post('/create/ticket','TicketController@store');
Route::get('/tickets', 'TicketController@index');
Route::get('/edit/ticket/{id}','TicketController@edit');
Route::post('/edit/ticket/{id}','TicketController@update');
Route::delete('/delete/ticket/{id}','TicketController@destroy');



Route::group(['prefix'=>'grouproute'],function(){
	Route::get('/khoahoc', function(){
		return "hello";
	})->name("route");
	Route::get("Goi", function(){
		return redirect()->route("route");
	});
});
Route::get('controller','mycontroller@Xinchao');
Route::get('laravel/{ten}','mycontroller@KhoaHoc');
Route::get('request','mycontroller@getURL');

Route::get('getFrom',function(){
	return view('from');
});
Route::post('postFrom',['as'=>'postFrom', 'uses'=>'mycontroller@postFrom']);


Route::get('setCookie','mycontroller@setCookie');
Route::get('getCookie','mycontroller@getCookie');

//postFile
Route::get('uploadFile',function(){
	return view('postFile');
});
Route::post('postFile',['as'=>'postFile','uses'=>'mycontroller@postFile']);

// json
Route::get('json','mycontroller@getJson');