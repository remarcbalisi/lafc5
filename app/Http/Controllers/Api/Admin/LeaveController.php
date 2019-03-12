<?php

namespace App\Http\Controllers\Api\Admin;

use App\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    public function list(){
        $leaves = Leave::get();
        foreach( $leaves as $leave ) {
            $leave['owner'] = $leave->getOwner($leave->id);
            $leave['deparment'] = $leave->getOwner($leave->id)->department->name;
        }
        return response()->json($leaves);
    }
}
