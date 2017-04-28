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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']],function () {
	
	Route::get('mahasiswas',['as'=>'mahasiswas.index','uses'=>'MahasiswaController@index']);
	Route::get('mahasiswas/create',['as'=>'mahasiswas.create','uses'=>'MahasiswaController@create']);
	Route::post('mahasiswas/create',['as'=>'mahasiswas.store','uses'=>'MahasiswaController@store']);
	Route::get('mahasiswas/{idmahasiswa}',['as'=>'mahasiswas.show','uses'=>'MahasiswaController@show']);
	Route::get('mahasiswas/{idmahasiswa}/edit',['as'=>'mahasiswas.edit','uses'=>'MahasiswaController@edit']);
	Route::patch('mahasiswas/{idmahasiswa}',['as'=>'mahasiswas.update','uses'=>'MahasiswaController@update']);
	Route::delete('mahasiswas/{idmahasiswa}',['as'=>'mahasiswas.destroy','uses'=>'MahasiswaController@destroy']);
});