<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => 'cors'], function () {

        Route::get('/home', 'HomeController@index');

        Route::group(['prefix' => 'api'], function () {
            Route::group(['prefix' => 'auth'], function() {
                Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
                Route::post('authenticate', 'AuthenticateController@authenticate');
                Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
                Route::post('register', 'AuthenticateController@signup');
            });
            Route::group(['prefix' => 'user'], function() {
                Route::post('update', 'UserController@update');
            });
            Route::group(['prefix' => 'pet'], function() {
                Route::get('all', 'PetController@all');
                Route::post('store', 'PetController@store');
            });
            Route::group(['prefix' => 'region'], function() {
                Route::get('province', 'RegionController@getAllProvinces');
                Route::get('province/{id}', 'RegionController@getProvinceById');
                Route::get('province/{id}/city', 'RegionController@getCitiesForProvince');
                Route::get('city/{id}', 'RegionController@getCityById');
                Route::get('city/{id}/area', 'RegionController@getAreasForCity');
                Route::get('area/{id}', 'RegionController@getAreaById');
            });
        });

        Route::post('record/{pet}', 'RecordController@store');
        Route::resource('record', 'RecordController');

    });
});
