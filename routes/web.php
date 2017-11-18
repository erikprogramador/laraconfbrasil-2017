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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('clients', 'ClientsController@index')->name('clients');
    Route::get('clients/create', 'ClientsController@create')->name('clients.create');
    Route::get('clients/edit/{client}', 'ClientsController@edit')->name('clients.edit');
    Route::get('clients/{client}', 'ClientsController@show')->name('clients.show');
    Route::post('clients', 'ClientsController@store')->name('clients.store');
    Route::put('clients/{client}', 'ClientsController@update')->name('clients.update');
    Route::delete('clients/{client}', 'ClientsController@destroy')->name('clients.destroy');
});
