@extends('layouts.app-copy')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>Add New User</h3>
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

                    <form action="{{route('store-new-user')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="fname" class="form-control" placeholder="First Name *" required /><br>
                        <input type="text" class="form-control" name="mname" placeholder="Middle Name *" value="" /><br>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name *" required /><br>
                        <input type="email" name="email" class="form-control" placeholder="Email *" required /><br>
                        <input type="text" name="username" class="form-control" placeholder="Username *" required /><br>
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="b_day" class="form-control" placeholder="Birthday *" /><br>
                        <input type="password" name="password" class="form-control" placeholder="Password" /><br>
                        <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" /><br>
                        <select name="gender" class="form-control">
                            @foreach( $gender as $g )
                            <option value="{{$g->id}}">{{ucfirst($g->name)}}</option>
                            @endforeach
                        </select>

                        <br>
                        <br>
                        ------ Job Title ------
                        <select name="team_leader" class="form-control" style="display:" id="team_leader_select">
                            <option class="hidden" selected disabled>Team Leader *</option>
                            @foreach( $team_leaders as $team_leader )
                            <option value="{{$team_leader->id}}">{{$team_leader->user->fname . ' ' . $team_leader->user->lname }}</option>
                            @endforeach
                        </select>

                        <div class="form-group form-check">
                        @foreach( $roles as $role )
                            <input type="checkbox" name="role[]" value="{{$role->id}}" class="form-check-input" onclick="toggleJobTitle(this)">
                            <label class="form-check-label">{{$role->name}}</label>
                        @endforeach
                        </div>

                        <br>
                        <br>

                        ------ Address ------
                        @foreach( $address_types as $addr_type )
                        <br>
                        <label for="{{$addr_type->name}}" class="col-md-4 col-form-label text-md-right">{{$addr_type->name}}{{ __(' Address') }}</label><br>
                        <input type="text" id="{{$addr_type->name}}-street" type="text" class="form-control{{ $errors->has($addr_type->name . '-street') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-street'}}" placeholder="Street" required><br>
                        <input type="text" id="{{$addr_type->name}}-unit-no" type="text" class="form-control{{ $errors->has($addr_type->name . '-unit-no') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-unit-no'}}" placeholder="Unit no." required><br>
                        <input type="text" id="{{$addr_type->name}}-barangay" type="text" class="form-control{{ $errors->has($addr_type->name . '-barangay') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-barangay'}}" placeholder="Brgy." required><br>
                        <input type="text" id="{{$addr_type->name}}-city" type="text" class="form-control{{ $errors->has($addr_type->name . '-city') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-city'}}" placeholder="City" required><br>
                        <input type="text" id="{{$addr_type->name}}-postal-code" type="text" class="form-control{{ $errors->has($addr_type->name . '-postal-code') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-postal-code'}}" placeholder="Postal Code" required><br>
                        <input type="text" id="{{$addr_type->name}}-province" type="text" class="form-control{{ $errors->has($addr_type->name . '-province') ? ' is-invalid' : '' }}" name="{{$addr_type->name . '-province'}}" placeholder="Province" required><br>
                        @endforeach

                        <br>
                        <br>
                        ------ Contacts ------
                        @foreach( $contact_types as $contact_type )
                        <br>
                        <label for="{{$contact_type->name}}" class="col-md-4 col-form-label text-md-right">{{$contact_type->name}}{{ __(' Contact') }}</label>
                        <br>
                        <input type="text" name="{{$contact_type->name . '-country-code'}}" placeholder="ex. +63" class="form-control" required /><br>
                        <input type="text" name="{{$contact_type->name . '-number'}}" class="form-control" placeholder="{{ __(' #') }}*" required /><br>
                        @endforeach

                        <br><br>

                        <input type="text" name="employee_id" class="form-control" placeholder="Employee ID *" required /><br>
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_hired" class="form-control" placeholder="Date Hired *" required /><br>
                        <br>

                        <select name="department_id" class="form-control" required>
                            <option class="hidden" selected disabled>Department</option>
                            @foreach( $departments as $department )
                            <option value="{{$department->id}}">{{ucfirst($department->name)}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection