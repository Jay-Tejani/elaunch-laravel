<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/listing', 'HomeController@getEmployees')->name('listing');
Route::get('create', 'HomeController@create');

// Route::get('/create', function () {
//     return view('employee');
// });
Route::post('/insert','HomeController@insert');

Route::get('/update/{id}','HomeController@update');

Route::post('/edit/{id}','HomeController@edit');

Route::get('/delete/{id}','HomeController@delete');

