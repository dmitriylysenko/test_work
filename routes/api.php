<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'clients', 'namespace' => 'Api'], function () {
  Route::post('/', 'ClientsController@create');
  Route::get('/', 'ClientsController@all');
  Route::get('/{id}', 'ClientsController@one');
  Route::delete('/{id}', 'ClientsController@destroy');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
