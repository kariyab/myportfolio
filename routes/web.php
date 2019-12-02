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

Route::group(['prefix' => 'bbs',], function() {
    Route::get('create', 'Vague\BbsController@add');
    Route::post('create', 'Vague\BbsController@create');
    Route::get('', 'Vague\BbsController@index');
    
    Route::get('edit', 'Vague\BbsController@edit');
    Route::post('edit', 'Vague\BbsController@update');
    Route::get('delete', 'Vague\BbsController@delete');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('edit', 'Vague\ProfileController@edit');
    Route::post('edit', 'Vague\ProfileController@update');
    Route::get('delete', 'Vague\ProfileController@delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
