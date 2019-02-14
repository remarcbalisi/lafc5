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
use App\User;
use App\Role;

Route::get('/adminpage-sample', function () {
    return view('adminpage-sample');
});


Route::get('/userlists-sample', function () {
    return view('userlists-sample');
});

Route::get('/apply-leave-sample', function () {
    return view('apply-leave-sample');
});

Route::get('/leave-request-sample', function () {
    return view('leave-request-sample');
});

Route::get('/frontpage-sample', function () {
    return view('frontpage-sample');
});

Route::get('/employeepage-sample', function () {
    return view('employeepage-sample');
});

Route::get('/user-info-sample', function () {
    return view('user-info-sample');
});

Route::get('/admin-info-sample', function () {
    return view('admin-info-sample');
});

Route::get('/aboutus-page-sample', function () {
    return view('aboutus-page-sample');
});


//Route::get('/', function () {
//    // return User::where(['id'=>Auth::user()->id])->first()->user_status()->where(['status_id'=>1])->get();
//    // return view('welcome');
//    // $user->hasRole($super_admin);
//    // $roles = Role::where(['id'=>2, 'id'=>3, 'id'=>4])->get();
//    return $roles;
//    $super_admin = Role::where(['id' => 2])->first();
//    return Auth::user()->hasRole($super_admin) ? 'True' : 'False';
//    $auth_user = Auth::user();
//    $auth_user->roles()->where(['role_id'=>1])->first();
//
//    $roles = Role::where([
//        'id' => 1
//    ])->get();
//
//    $array_of_users = [];
//
//    foreach( $roles as $role ){
//        return $role->user_roles()->get();
//        foreach( $role->user_roles()->get() as $user_role ){
//            if( $auth_user->department_id == $user_role->user->first()->department_id ){
//                array_push($array_of_users, $user_role->user);
//            }
//            // array_push($array_of_users, $user_role->user);
//            // return $user_role->user;
//        }
//    }
//
//    return $array_of_users;
//
//});

Route::get('/', function () {

    return view('frontpage');

})->name('landing-page');

Route::get('/login', function () {
    return view('frontpage');
})->name('login');



//Auth::routes();

Route::group(
    
    [   
        'prefix' => 'admin',
        'middleware' => [
            'auth:web',
            'user_stat',
            'admin_acc',
        ]

    ],
    
    function () {
    Route::get('/home', 'HomeController@index')->name('admin-home');
    Route::get('/user-lists', 'UserController@lists')->name('user-lists');
    Route::get('/leave-lists', 'UserController@lists')->name('leave-lists');
    Route::get('/view-user/{user_id}', 'UserController@viewSingleUser')->name('view-single-user');
    Route::get('/user-create', 'UserController@createUser')->name('create-new-user');
    Route::post('/user-store','UserController@storeUser')->name('store-new-user');
    Route::get('/user-edit/{user_id}/', 'UserController@editUser')->name('edit-user');
    Route::put('/user-edit/{user_id}/', 'UserController@updateUser')->name('update-user');
    Route::put('/user-update-status', 'UserController@updateUserStatus')->name('update-user-status');
    Route::put('/user-update-leave-credits-increment/{user_id}', 'UserController@update_leave_credits')->name('update-user-leave-credits-increment');
    Route::get('/apply-leave', 'LeaveController@apply')->name('apply-leave');
    Route::post('/store-apply-leave', 'LeaveController@store')->name('store-apply-leave');
    Route::get('/leave-lists', 'LeaveController@list')->name('leave-lists');
    Route::get('/leave-view/{leave_request_id}', 'LeaveController@view')->name('leave-view');
    Route::put('/leave-update-change-status/{leave_request_id}', 'LeaveController@changeStatus')->name('leave-update-change-status');
    Route::put('/leave-approve-disapprove/{leave_request_id}', 'LeaveController@approveDisapprove')->name('leave-approve-disapprove');
    Route::get('/notifications', 'NotificationController@list')->name('notification-list');
    Route::get('/notification-view/{notification_id}', 'NotificationController@view')->name('notification-view');

});


Route::group(

    [
        'prefix' => 'hrm',
        'middleware' => [
            'auth:web',
            'user_stat',
            'hrm_acc',
        ]

    ],

    function () {
        Route::get('/home', 'Hrm\HomeController@home')->name('hrm-home');
        Route::get('/user-lists', 'Hrm\UserController@lists')->name('hrm-user-lists');
        Route::get('/user-create', 'Hrm\UserController@createUser')->name('hrm-create-new-user');
        Route::post('/user-store','Hrm\UserController@storeUser')->name('hrm-store-new-user');
        Route::get('/user-leave-apply', 'Hrm\LeaveController@apply')->name('hrm-leave-apply');
        Route::get('/user-leave-list', 'Hrm\LeaveController@list')->name('hrm-leave-list');
        Route::post('/user-leave-apply-store', 'Hrm\LeaveController@store')->name('hrm-leave-apply-store');
        Route::get('/user-leave-view/{leave_request_id}', 'Hrm\LeaveController@view')->name('hrm-leave-view');
    });

Route::group(

    [
        'prefix' => 'agent',
        'middleware' => [
            'auth:web',
            'user_stat',
            'agent_acc',
        ]

    ],

    function () {
        Route::get('/home', 'Agent\HomeController@home')->name('agent-home');
        Route::get('/user-leave-apply', 'Agent\LeaveController@apply')->name('agent-leave-apply');
        Route::post('/user-leave-apply-store', 'Agent\LeaveController@store')->name('agent-leave-apply-store');
        Route::get('/my-leave-list', 'Agent\LeaveController@list')->name('agent-leave-list');
        Route::get('/my-leave-view/{leave_request_id}', 'Agent\LeaveController@view')->name('agent-leave-view');
    });