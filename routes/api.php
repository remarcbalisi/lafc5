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
    Route::get('my-roles', 'Api\UserController@my_roles');
    Route::get('user-list', 'Api\UserController@userList');
    Route::get('user-info/{id}', 'Api\UserController@viewInfo');
    Route::get('admin/leave-requests', 'Api\Admin\LeaveController@list');
    Route::post('admin/apply', 'Api\Admin\LeaveController@apply');
    Route::get('admin/approve-disapprove/{leave_id}/{user_id}/{action}/{note}', 'Api\Admin\LeaveController@approveDisapprove');

});


Route::get('roles', 'Api\RoleController@get');
Route::get('gender', 'Api\GenderController@get');
Route::get('leave_type', 'Api\LeaveTypeController@get');