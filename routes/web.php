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
Route::get('contact', function(){
    return view('contact');
});

Route::group(['middleware' => ['role:customer']], function(){
    Route::match(['get', 'post'],'/rent', 'RentController@index')->name('rent');
    Route::get('/rent/form', 'RentController@form');
    Route::get('/rent/check', 'RentController@check');
    Route::get('/rent/invoice', 'RentController@invoice');
    Route::get('invoices', 'InvoicesController@index');
    Route::get('invoices/{id}', 'InvoicesController@show');
    Route::get('invoices/{id}/pdf', 'InvoicesController@pdf');
    Route::get('profile', 'UsersController@self');
    Route::patch('profile/{id}', 'UsersController@selfupdate');
    Route::get('add/{id}', 'CartController@add');
    Route::get('deleterow/{id}', 'CartController@delete');
});

Route::group(['middleware' => ['role:employee']], function () {
    Route::resource('users', 'UsersController');
    Route::get('daylist/form', 'RentController@daylistform');
    Route::post('daylist', 'RentController@daylist')->name('daylist');
    Route::get('daylist/pdf/{date}', 'RentController@pdf');
    Route::resource('cars', 'CarController');
    Route::resource('users', 'UsersController');
});


