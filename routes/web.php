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

Route::get('/home', 'HomeController@index');

Route::match(['get', 'post'],'/rent', 'RentController@index')->name('rent');
Route::get('/rent/form', 'RentController@form');

Route::get('add/{id}', 'CartController@add');

Route::get('deleterow/{id}', 'CartController@delete');

Route::get('contact', function(){
    return view('contact.show');
});


Route::group(['middleware' => ['role:employee']], function () {
    Route::resource('users', 'UsersController');
});


