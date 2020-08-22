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

Route::get('/input', 'ContentController@input')->name('input');
Route::post('/save', 'ContentController@save')->name('save');
Route::get('/output', 'ContentController@output')->name('output');
Route::post('/delete', 'ContentController@delete')->name('delete');
Route::get('/edit/{content_id}', 'ContentController@edit')->name('edit');
Route::post('/update', 'ContentController@update')->name('update');

Route::get('/status', 'StatusController@status')->name('status');