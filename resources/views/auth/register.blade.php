@extends('layouts.signup')

@section('content')
<div class="row">
    <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Fiercecom Inc.</h3>
        <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
    </div>
    <div class="col-md-9 register-right">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">Sign Up</h1>
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
                
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control" placeholder="First Name *" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" value="{{ old('lname') }}" class="form-control" placeholder="Last Name *" required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email *" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username *" required />
                            </div>
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="b_day" value="{{ old('b_day') }}" class="form-control" placeholder="Birthday *" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password *" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password *" required />
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    @foreach( $gender as $g )
                                    <option value="{{$g->id}}">{{ucfirst($g->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden" selected disabled>Team Leader *</option>
                                    <option>Regine</option>
                                    <option>Remarc</option>
                                    <option>Julven</option>
                                    <option>Fretzie</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="mname" value="{{ old('mname') }}" placeholder="Middle Name *" value="" />
                            </div>
                            
                            @foreach( $address_types as $address_type )
                            <div class="form-group">
                            <label for="{{$address_type->name}}" class="col-md-4 col-form-label text-md-right">{{$address_type->name}}{{ __(' Address') }}</label>
                            <div class="row">
                                
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-street" type="text" class="form-control{{ $errors->has($address_type->name . '-street') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-street'}}" value="{{ old($address_type->name . '-street') }}" placeholder="Street" required>
                                </div>
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-unit-no" type="text" class="form-control{{ $errors->has($address_type->name . '-unit-no') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-unit-no'}}" value="{{ old($address_type->name . '-unit-no') }}" placeholder="Unit no." required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-barangay" type="text" class="form-control{{ $errors->has($address_type->name . '-barangay') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-barangay'}}" value="{{ old($address_type->name . '-barangay') }}" placeholder="Brgy." required>
                                </div>
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-city" type="text" class="form-control{{ $errors->has($address_type->name . '-city') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-city'}}" value="{{ old($address_type->name . '-city') }}" placeholder="City" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-postal-code" type="text" class="form-control{{ $errors->has($address_type->name . '-postal-code') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-postal-code'}}" value="{{ old($address_type->name . '-postal-code') }}" placeholder="Postal Code" required>
                                </div>
                                <div class="col">
                                <input type="text" id="{{$address_type->name}}-province" type="text" class="form-control{{ $errors->has($address_type->name . '-province') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-province'}}" value="{{ old($address_type->name . '-province') }}" placeholder="Province" required>
                                </div>
                            </div>
                            </div>
                            @endforeach

                            @foreach( $contact_types as $contact_type )
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                    <input type="text" name="{{$contact_type->name . '-country-code'}}" value="{{ old($contact_type->name . '-country-code') }}" placeholder="ex. +63" class="form-control" required />
                                    </div>
                                    <div class="col">
                                    <input type="text" name="{{$contact_type->name . '-number'}}" value="{{ old($contact_type->name . '-number') }}" class="form-control" placeholder="{{$contact_type->name}}{{ __(' #') }}*" required />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                <input type="text" name="employee_id" value="{{ old('employee_id') }}" class="form-control" placeholder="Employee ID *" required />
                            </div>
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_hired" value="{{ old('date_hired') }}" class="form-control" placeholder="Date Hired *" required />
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control" required>
                                    <option class="hidden" selected disabled>Job Title *</option>
                                    @foreach( $roles as $role )
                                    <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="department_id" class="form-control" required>
                                    <option class="hidden" selected disabled>Department</option>
                                    @foreach( $departments as $department )
                                    <option value="{{$department->id}}">{{ucfirst($department->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
