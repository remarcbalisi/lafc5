@extends('layouts.app-copy')

@section('content')

<style>
.container{
    margin-top:5%;

}
</style>

<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>{{$user->fname . ' ' . $user->lname}}</h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success_msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success_msg') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('update-user', ['user_id'=>$user->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="text" name="fname" value="{{ $user->fname }}" class="form-control input-lg" placeholder="First Name *" required /><br>
                    <input type="text" class="form-control input-lg" name="mname" value="{{ $user->mname }}" placeholder="Middle Name *" value="" /><br>
                    <input type="text" name="lname" value="{{ $user->lname }}" class="form-control input-lg" placeholder="Last Name *" required /><br>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control input-lg" placeholder="Email *" required /><br>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control input-lg" placeholder="Username *" required /><br>
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="b_day" value="{{ $user->b_day }}" class="form-control input-lg" placeholder="Birthday *" /><br>
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" /><br>
                    <input type="password" name="password_confirmation" class="form-control input-lg"  placeholder="Confirm Password" /><br>
                    <select name="gender" class="form-control input-lg">
                        @foreach( $gender as $g )
                            @if( $user->gender->id == $g->id )
                            <option value="{{$g->id}}" selected>{{ucfirst($g->name)}}</option>
                            @else
                            <option value="{{$g->id}}">{{ucfirst($g->name)}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>

                    <br>
                    <br>
                    ------ Job Title ------
                    <select name="team_leader" class="form-control input-lg" style="display:{{ ($user->user_roles()->where('role_id', '=', 3)->first()) ? 'none;' : '' }}" id="team_leader_select">
                        <option class="hidden" selected disabled>Team Leader *</option>
                        @foreach( $team_leaders as $team_leader )
                            @if( $user->team_leader == $team_leader->id )
                            <option value="{{$team_leader->id}}" selected >{{$team_leader->user->fname . ' ' . $team_leader->user->lname }}</option>
                            @else
                            <option value="{{$team_leader->id}}">{{$team_leader->user->fname . ' ' . $team_leader->user->lname }}</option>
                            @endif
                        @endforeach
                    </select>

                    <div class="form-group form-check">
                    @foreach( $roles as $role )
                        @if( $user->user_roles()->where('role_id','=',$role->id)->get()->count() > 0  )
                        <input type="checkbox" name="role[]" value="{{$role->id}}" class="form-check-input" onclick="toggleJobTitle(this)" checked>
                        <label class="form-check-label">{{$role->name}}</label>
                        @else
                        <input type="checkbox" name="role[]" value="{{$role->id}}" class="form-check-input" onclick="toggleJobTitle(this)">
                        <label class="form-check-label">{{$role->name}}</label>
                        @endif
                    @endforeach
                    </div>

                    <br>
                    <br>
                    ------ Address ------
                    @foreach( $user->address()->get() as $user_address )
                    <br>
                    <label for="{{$user_address->address_type->name}}" class="col-md-4 col-form-label text-md-right">{{$user_address->address_type->name}}{{ __(' Address') }}</label><br>
                    <input type="text" id="{{$user_address->address_type->name}}-street" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-street') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-street'}}" value="{{ $user_address->street }}" placeholder="Street" required><br>
                    <input type="text" id="{{$user_address->address_type->name}}-unit-no" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-unit-no') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-unit-no'}}" value="{{ $user_address->unit_no }}" placeholder="Unit no." required><br>
                    <input type="text" id="{{$user_address->address_type->name}}-barangay" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-barangay') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-barangay'}}" value="{{ $user_address->barangay }}" placeholder="Brgy." required><br>
                    <input type="text" id="{{$user_address->address_type->name}}-city" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-city') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-city'}}" value="{{ $user_address->city }}" placeholder="City" required><br>
                    <input type="text" id="{{$user_address->address_type->name}}-postal-code" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-postal-code') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-postal-code'}}" value="{{ $user_address->postal_code }}" placeholder="Postal Code" required><br>
                    <input type="text" id="{{$user_address->address_type->name}}-province" type="text" class="form-control{{ $errors->has($user_address->address_type->name . '-province') ? ' is-invalid' : '' }} input-lg" name="{{$user_address->address_type->name . '-province'}}" value="{{ $user_address->province }}" placeholder="Province" required><br>
                    @endforeach

                    <br>
                    <br>
                    ------ Contacts ------
                    @foreach( $user->contacts()->get() as $user_contact )
                    <br>
                    <input type="text" name="{{$user_contact->contact_type->name . '-country-code'}}" value="{{ $user_contact->country_code }} " placeholder="ex. +63" class="form-control input-lg" required /><br>
                    <input type="text" name="{{$user_contact->contact_type->name . '-number'}}" value="{{ $user_contact->number }}" class="form-control input-lg" placeholder="{{$user_contact->contact_type->name}}{{ __(' #') }}*" required /><br>
                    @endforeach

                    <br><br>

                    <input type="text" name="employee_id" value="{{ $user->employee_id }}" class="form-control input-lg" placeholder="Employee ID *" required /><br>
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_hired" value="{{ $user->date_hired }}" class="form-control input-lg" placeholder="Date Hired *" required /><br>
                    <br>
                    <select name="department_id" class="form-control input-lg" required>
                        <option class="hidden" selected disabled>Department</option>
                        @foreach( $departments as $department )
                            @if( $user->department_id == $department->id )
                            <option value="{{$department->id}}" selected>{{ucfirst($department->name)}}</option>
                            @else
                            <option value="{{$department->id}}">{{ucfirst($department->name)}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg" style="margin-bottom:4%">
                        {{ __('Update It!') }}
                    </button>

                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection