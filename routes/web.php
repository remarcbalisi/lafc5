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

Route::get('/', function () {
    // return User::where(['id'=>Auth::user()->id])->first()->user_status()->where(['status_id'=>1])->get();
    // return view('welcome');
    // $user->hasRole($super_admin);
    $super_admin = Role::where(['id' => 2])->first();
    return Auth::user()->hasRole($super_admin) ? 'True' : 'False';
    $auth_user = Auth::user();
    $auth_user->roles()->where(['role_id'=>1])->first();

    $roles = Role::where([
        'id' => 1
    ])->get();

    $array_of_users = [];

    foreach( $roles as $role ){
        return $role->user_roles()->get();
        foreach( $role->user_roles()->get() as $user_role ){
            if( $auth_user->department_id == $user_role->user->first()->department_id ){
                array_push($array_of_users, $user_role->user);
            }
            // array_push($array_of_users, $user_role->user);
            // return $user_role->user;
        }
    }

    return $array_of_users;

});

Auth::routes();

//the are the url's that needs auth and user stat of 1
Route::middleware('auth', 'user_stat', 'admin_acc')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user-lists', 'UserController@lists')->name('user-lists');
    Route::get('/leave-lists', 'UserController@lists')->name('leave-lists');
    Route::get('/view-user/{user_id}', 'UserController@viewSingleUser')->name('view-single-user');
    Route::get('/user-create', 'UserController@createUser')->name('create-new-user');
});
