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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin'], function() {
    Route::get('/', 'admin\AdminController@index');
    Route::get('/requesters', 'admin\RequesterController@index')->name('requesters');

    Route::group(['prefix' => '/requester'], function() {
        Route::get('/', 'admin\SubmitedRequestController@index')->name('requests');
        Route::get('/{id}', 'admin\RequesterController@view')->name('requester');
        Route::get('/create', 'admin\RequesterController@create')->name('requester.create');
        Route::post('/create', 'admin\RequesterController@createPost')->name('requester.create');
        Route::get('/edit/{id}', 'admin\RequesterController@getEdit')->name('requester.edit');
        Route::post('/edit/{id}', 'admin\RequesterController@postEdit')->name('requester.edit');
    });

    Route::group(['prefix' => '/request'], function() {
        Route::get('/create', 'admin\SubmitedRequestController@create')->name('request.create');
        Route::post('/create', 'admin\SubmitedRequestController@createPost')->name('request.create');
        Route::get('/{id}', 'admin\SubmitedRequestController@view')->name('request');
        Route::get('/edit/{id}', 'admin\SubmitedRequestController@getEdit')->name('request.edit');
        Route::post('/edit/{id}', 'admin\SubmitedRequestController@postEdit')->name('request.edit');
    });
    
});




















