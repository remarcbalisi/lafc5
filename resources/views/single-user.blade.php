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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Leave Credits

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

                        <form method="POST" action="{{route('update-user-leave-credits-increment', ['user_id'=>$user->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="leave_credits">Credits</label>
                                <input type="number" name="leave_credits" value="{{$user->leave_credits}}" class="form-control" id="leave_credits" placeholder="Credits">
                            </div>
                            <div class="form-group">
                                <label for="leave_increment">Increment</label>
                                <input type="number" name="leave_increment" value="{{$user->leave_increment}}" class="form-control" id="leave_increment" placeholder="Increment">
                            </div>
                            <button type="submit" class="btn btn-warning">Update Now</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
