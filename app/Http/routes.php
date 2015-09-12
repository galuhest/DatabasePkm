<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PkmController@index');

Route::when('*', 'csrf', array('post', 'put', 'patch', 'delete'));

Route::get('/pkm/add', 'PkmController@create');

Route::post('/pkm/add','PkmController@store');

Route::get('/pkm/delete/{id}', 'PkmController@destroy');

Route::get('/pkm/view/{id}','PkmController@show');

Route::get('/auth/login', 'UserController@login');

Route::get('/pkm/edit/{id}','PkmController@edit');

Route::post('/pkm/edit/{id}','PkmController@update');

Route::get('/auth/logout','UserController@logout');

Route::get('/pkm/showall', 'PkmController@showall');

Route::get('/auth/newUser','UserController@create');

Route::post('/auth/newUser','UserController@store');

Route::get('/pkm/view/category/{id}','PkmController@viewCategory');

Route::get('/pkm/q=search','PkmController@search');

Route::get('/user/control_panel/{id}','PkmController@uploaded');

Route::get('/pkm/view=sort','PkmController@sort');

Route::get('/pkm/chart','PkmController@chart');

Route::group(['prefix' => 'api'], function () {
    Route::get('/', 'endpoint_controller@index');

    Route::get('/pkm/add', 'endpoint_controller@create');

    Route::get('/pkm/view/{id}','endpoint_controller@show');

    Route::get('/pkm/edit/{id}','endpoint_controller@edit');

    Route::get('/pkm/showall', 'endpoint_controller@showall');

    Route::get('/pkm/view/category/{id}','endpoint_controller@viewCategory');

    Route::get('/pkm/q=search','endpoint_controller@search');

    Route::get('/user/control_panel/{id}','endpoint_controller@uploaded');

    Route::get('/pkm/view=sort','endpoint_controller@sort');

    Route::get('/pkm/chart','endpoint_controller@chart');
});