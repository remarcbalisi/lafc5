<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\UserRole;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    
    public function me(){
        $user = auth()->user();
        $user['roles'] = UserRole::where('user_id',$user->id)->get();
        return response()->json($user);
    }

    public function my_roles(){
        $user = auth()->user();
        $roles = UserRole::where('user_id',$user->id)->get();
        $myrole = '';
        foreach( $roles as $role ){
            $myrole .= $role->role->name . ', ';
        }
        return $myrole;
        return response()->json($user);
    }

    public function userList(){
        if( auth()->user()->can('view_user_list', User::class) ){
            return response()->json(User::paginate(20));
        }
    }

    public function viewInfo($user_id){
        $selected_user = User::where(['id'=>$user_id])->first();

        $selected_user["contacts"] = $selected_user->contacts()->get();
        foreach($selected_user["contacts"] as $contact){
            $contact["contact_type"] = $contact->contact_type;
        }

        $selected_user["team_leader_info"] = $selected_user->team_leader()->first();

        $selected_user["department"] = $selected_user->department;

        $selected_user["address"] = $selected_user->address()->get();
        foreach($selected_user["address"] as $addr){
            $addr["type"] = $addr->address_type->name;
        }

        $selected_user["user_roles"] = $selected_user->user_roles()->get();
        foreach($selected_user["user_roles"] as $ur){
            $ur["role"] = $ur->role;
        }

        $selected_user["user_status"] = $selected_user->user_status()->get();
        foreach($selected_user["user_status"] as $us){
            $us["status"] = $us->status;
        }

        if( auth()->user()->can('view', $selected_user) ){
            return response()->json($selected_user);
        }
    }
}
