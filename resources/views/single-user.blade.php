@extends('layouts.app-copy')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile
                <a href="{{route('edit-user', ['user_id'=>$user->id])}}">
                <button style="align:right" type="button" class="btn btn-warning btn-sm">Edit</button>
                </a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>

                        {{ $user->fname . ' ' . $user->lname }} (
                        @foreach( $user->user_status()->get() as $u_status )
                        {{$u_status->status->name . ', '}}
                        @endforeach )

                    </h1>
                    
                    <h5>{{$user->email}}</h5>

                    <p>Gender: {{ $user->gender->name }}</p>

                    <p>
                      Position:
                      @foreach( $user->user_roles()->get() as $user_role )
                        {{ $user_role->role->name . ', ' }}
                      @endforeach
                    </p>

                    <p>
                      Contact:
                      <ul>

                        @foreach( $user->contacts()->get() as $contact )

                        <li>
                          {{ $contact->contact_type->name . ': ' . $contact->number }}
                        </li>
                        
                        @endforeach
                      </ul>
                    </p>

                    <p>

                      Address:

                      <ul>
                      
                      @foreach( $user->address()->get() as $addr )
                        <li>
                          {{ $addr->street . ' ' . $addr->unit_no . ' blah blah..' }}
                        </li>
                      @endforeach
                      
                      </ul>

                    </p>


                    <p>Department: {{ $user->department->name }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
