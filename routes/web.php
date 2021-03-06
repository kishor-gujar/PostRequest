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
    Route::get('/', 'Admin\AdminController@index');
    Route::get('requester/create', 'Admin\RequesterController@create')->name('requester.create');
    Route::post('requester/create', 'Admin\RequesterController@createPost')->name('requester.create');
    Route::get('/requesters', 'Admin\RequesterController@index')->name('requesters');
    Route::group(['prefix' => '/requester'], function() {
        Route::get('/{id}', 'Admin\RequesterController@view')->name('requester');

        Route::get('/edit/{id}', 'Admin\RequesterController@getEdit')->name('requester.edit');
        Route::post('/edit/{id}', 'Admin\RequesterController@postEdit')->name('requester.edit');
    });

    Route::get('/requests', 'Admin\SubmitedRequestController@index')->name('requests');
    Route::group(['prefix' => '/request'], function() {
        Route::get('/create', 'Admin\SubmitedRequestController@create')->name('request.create');
        Route::post('/create', 'Admin\SubmitedRequestController@createPost')->name('request.create');
        Route::get('/{id}', 'Admin\SubmitedRequestController@view')->name('request');
        Route::get('/edit/{id}', 'Admin\SubmitedRequestController@getEdit')->name('request.edit');
        Route::post('/edit/{id}', 'Admin\SubmitedRequestController@postEdit')->name('request.edit');
    });

    Route::get('/request-lines', 'Admin\LineController@index')->name('lines');
    Route::group(['prefix' => '/request-line'], function() {
        Route::get('/create', 'Admin\LineController@create')->name('line.create');
        Route::post('/create', 'Admin\LineController@createPost')->name('line.create');
        Route::get('/{id}', 'Admin\LineController@view')->name('line');
        Route::get('/edit/{id}', 'Admin\LineController@getEdit')->name('line.edit');
        Route::post('/edit/{id}', 'Admin\LineController@postEdit')->name('line.edit');
    });

    Route::get('/receiver-types', 'Admin\ReceiverTypeController@index')->name('receiver.types');
    Route::group(['prefix' => '/request-type'], function() {
        Route::get('/create', 'Admin\ReceiverTypeController@create')->name('receiver.type.create');
        Route::post('/create', 'Admin\ReceiverTypeController@createPost')->name('receiver.type.create');
        Route::get('/{id}', 'Admin\ReceiverTypeController@view')->name('receiver.type');
        Route::get('/edit/{id}', 'Admin\ReceiverTypeController@getEdit')->name('receiver.type.edit');
        Route::post('/edit/{id}', 'Admin\ReceiverTypeController@postEdit')->name('receiver.type.edit');
    });

    Route::get('/receiver-sub-types', 'Admin\ReceiverSubTypeController@index')->name('receiver.sub.types');
     Route::group(['prefix' => '/receiver-sub-type'], function() {
         Route::get('/create', 'Admin\ReceiverSubTypeController@create')->name('receiver.sub.type.create');
         Route::post('/create', 'Admin\ReceiverSubTypeController@createPost')->name('receiver.sub.type.create');
         Route::get('/{id}', 'Admin\ReceiverSubTypeController@view')->name('receiver.sub.type');
         Route::get('/edit/{id}', 'Admin\ReceiverSubTypeController@getEdit')->name('receiver.sub.type.edit');
         Route::post('/edit/{id}', 'Admin\ReceiverSubTypeController@postEdit')->name('receiver.sub.type.edit');
     });
    Route::get('/receiver-companies', 'Admin\CompanyController@index')->name('companies');
     Route::group(['prefix' => '/receiver-company'], function() {
         Route::get('/create', 'Admin\CompanyController@create')->name('company.create');
         Route::post('/create', 'Admin\CompanyController@createPost')->name('company.create');
         Route::get('/{id}', 'Admin\CompanyController@view')->name('company');
         Route::get('/edit/{id}', 'Admin\CompanyController@getEdit')->name('company.edit');
         Route::post('/edit/{id}', 'Admin\CompanyController@postEdit')->name('company.edit');
     });
    Route::get('/receivers', 'Admin\ReceiverController@index')->name('receivers');
     Route::group(['prefix' => '/receiver'], function() {
         Route::get('/create', 'Admin\ReceiverController@create')->name('receiver.create');
         Route::post('/create', 'Admin\ReceiverController@createPost')->name('receiver.create');
         Route::get('/{id}', 'Admin\ReceiverController@view')->name('receiver');
         Route::get('/edit/{id}', 'Admin\ReceiverController@getEdit')->name('receiver.edit');
         Route::post('/edit/{id}', 'Admin\ReceiverController@postEdit')->name('receiver.edit');
     });
    Route::get('/states', 'Admin\StateController@index')->name('states');
     Route::group(['prefix' => '/state'], function() {
         Route::get('/create', 'Admin\StateController@create')->name('state.create');
         Route::post('/create', 'Admin\StateController@createPost')->name('state.create');
         Route::get('/{id}', 'Admin\StateController@view')->name('state');
         Route::get('/edit/{id}', 'Admin\StateController@getEdit')->name('state.edit');
         Route::post('/edit/{id}', 'Admin\StateController@postEdit')->name('state.edit');
     });
    Route::get('/towns', 'Admin\TownController@index')->name('towns');
     Route::group(['prefix' => '/town'], function() {
         Route::get('/create', 'Admin\TownController@create')->name('town.create');
         Route::post('/create', 'Admin\TownController@createPost')->name('town.create');
         Route::get('/{id}', 'Admin\TownController@view')->name('town');
         Route::get('/edit/{id}', 'Admin\TownController@getEdit')->name('town.edit');
         Route::post('/edit/{id}', 'Admin\TownController@postEdit')->name('town.edit');
     });
    Route::get('/priorities', 'Admin\PriorityController@index')->name('priorities');
     Route::group(['prefix' => '/priority'], function() {
         Route::get('/create', 'Admin\PriorityController@create')->name('priority.create');
         Route::post('/create', 'Admin\PriorityController@createPost')->name('priority.create');
         Route::get('/{id}', 'Admin\PriorityController@view')->name('priority');
         Route::get('/edit/{id}', 'Admin\PriorityController@getEdit')->name('priority.edit');
         Route::post('/edit/{id}', 'Admin\PriorityController@postEdit')->name('priority.edit');
     });
    Route::get('/advertisers', 'Admin\AdvertiserController@index')->name('advertisers');
     Route::group(['prefix' => '/advertiser'], function() {
         Route::get('/create', 'Admin\AdvertiserController@create')->name('advertiser.create');
         Route::post('/create', 'Admin\AdvertiserController@createPost')->name('advertiser.create');
         Route::get('/{id}', 'Admin\AdvertiserController@view')->name('advertiser');
         Route::get('/edit/{id}', 'Admin\AdvertiserController@getEdit')->name('advertiser.edit');
         Route::post('/edit/{id}', 'Admin\AdvertiserController@postEdit')->name('advertiser.edit');
     });
    Route::get('/backgrounds', 'Admin\BackgroundController@index')->name('backgrounds');
     Route::group(['prefix' => '/background'], function() {
         Route::get('/create', 'Admin\BackgroundController@create')->name('background.create');
         Route::post('/create', 'Admin\BackgroundController@createPost')->name('background.create');
         Route::get('/{id}', 'Admin\BackgroundController@view')->name('background');
         Route::get('/edit/{id}', 'Admin\BackgroundController@getEdit')->name('background.edit');
         Route::post('/edit/{id}', 'Admin\BackgroundController@postEdit')->name('background.edit');
     });

     Route::get('/request-links', 'Admin\RequestLinkController@index')->name('links');
     Route::group(['prefix' => '/request-link'], function() {
         Route::get('/create', 'Admin\RequestLinkController@create')->name('link.create');
         Route::post('/create', 'Admin\RequestLinkController@createPost')->name('link.create');
         Route::get('/{id}', 'Admin\RequestLinkController@view')->name('link');
         Route::get('/edit/{id}', 'Admin\RequestLinkController@getEdit')->name('link.edit');
         Route::post('/edit/{id}', 'Admin\RequestLinkController@postEdit')->name('link.edit');
     });
});




















