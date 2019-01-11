<h1>Create User</h1>


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
<input type="text" name="fname" value="{{ old('fname') }}" class="form-control" placeholder="First Name *" required /><br>
<input type="text" class="form-control" name="mname" value="{{ old('mname') }}" placeholder="Middle Name *" value="" /><br>
<input type="text" name="lname" value="{{ old('lname') }}" class="form-control" placeholder="Last Name *" required /><br>
<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email *" required /><br>
<input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username *" required /><br>
<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="b_day" value="{{ old('b_day') }}" class="form-control" placeholder="Birthday *" /><br>
<input type="password" name="password" class="form-control" placeholder="Password *" required /><br>
<input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password *" required /><br>
<select name="gender" class="form-control">
    @foreach( $gender as $g )
    <option value="{{$g->id}}">{{ucfirst($g->name)}}</option>
    @endforeach
</select>
<br>
<select name="team_leader" class="form-control">
    <option class="hidden" selected disabled>Team Leader *</option>
    @foreach( $team_leaders as $team_leader )
    <option value="{{$team_leader->id}}" >{{$team_leader->user->fname . ' ' . $team_leader->user->lname }}</option>
    @endforeach
</select>
<br>
<br>
------ Address ------
@foreach( $address_types as $address_type )
<br>
<label for="{{$address_type->name}}" class="col-md-4 col-form-label text-md-right">{{$address_type->name}}{{ __(' Address') }}</label><br>
<input type="text" id="{{$address_type->name}}-street" type="text" class="form-control{{ $errors->has($address_type->name . '-street') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-street'}}" value="{{ old($address_type->name . '-street') }}" placeholder="Street" required><br>
<input type="text" id="{{$address_type->name}}-unit-no" type="text" class="form-control{{ $errors->has($address_type->name . '-unit-no') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-unit-no'}}" value="{{ old($address_type->name . '-unit-no') }}" placeholder="Unit no." required><br>
<input type="text" id="{{$address_type->name}}-barangay" type="text" class="form-control{{ $errors->has($address_type->name . '-barangay') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-barangay'}}" value="{{ old($address_type->name . '-barangay') }}" placeholder="Brgy." required><br>
<input type="text" id="{{$address_type->name}}-city" type="text" class="form-control{{ $errors->has($address_type->name . '-city') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-city'}}" value="{{ old($address_type->name . '-city') }}" placeholder="City" required><br>
<input type="text" id="{{$address_type->name}}-postal-code" type="text" class="form-control{{ $errors->has($address_type->name . '-postal-code') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-postal-code'}}" value="{{ old($address_type->name . '-postal-code') }}" placeholder="Postal Code" required><br>
<input type="text" id="{{$address_type->name}}-province" type="text" class="form-control{{ $errors->has($address_type->name . '-province') ? ' is-invalid' : '' }}" name="{{$address_type->name . '-province'}}" value="{{ old($address_type->name . '-province') }}" placeholder="Province" required><br>
@endforeach

<br>
<br>
------ Contacts ------
@foreach( $contact_types as $contact_type )
<br>
<input type="text" name="{{$contact_type->name . '-country-code'}}" value="{{ old($contact_type->name . '-country-code') }}" placeholder="ex. +63" class="form-control" required /><br>
<input type="text" name="{{$contact_type->name . '-number'}}" value="{{ old($contact_type->name . '-number') }}" class="form-control" placeholder="{{$contact_type->name}}{{ __(' #') }}*" required /><br>
@endforeach

<br><br>

<input type="text" name="employee_id" value="{{ old('employee_id') }}" class="form-control" placeholder="Employee ID *" required /><br>
<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_hired" value="{{ old('date_hired') }}" class="form-control" placeholder="Date Hired *" required /><br>
<select name="role" class="form-control" required>
    <option class="hidden" selected disabled>Job Title *</option>
    @foreach( $roles as $role )
    <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
    @endforeach
</select>
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
    {{ __('Register') }}
</button>

</form>