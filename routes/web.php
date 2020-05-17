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
    return view('index');
});

Route::get('/create-pallete','IndexController@createPallette');
Route::resource('/data','DataController');
Route::resource('/','IndexController');
Route::get('/getData','IndexController@getData');
Route::get('/getPositif','IndexController@getPositif');
Route::post('/search','IndexController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
