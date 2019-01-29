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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

});

Route::group([

    'middleware' => 'api',

], function ($router) {
    
    //user
    Route::get('me', 'Api\UserController@me');
    Route::get('user-list', 'Api\UserController@userList');
    Route::get('user-info/{id}', 'Api\UserController@viewInfo');

});


Route::get('roles', 'Api\RoleController@get');
Route::get('gender', 'Api\GenderController@get');