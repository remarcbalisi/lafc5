@extends('agent.layouts.app')

@section('content')


<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<header>
  <div style="padding-left:10%">

    <h2 style="padding-top:3%;font-weight:bold;">
    {{ $user->fname . ' ' . $user->lname }} (
                            @foreach( $user->user_status()->get() as $u_status )
                                {{$u_status->status->name . ', '}}
                            @endforeach
                                         )
    </h2>
    <br>
    <h4 style="margin-left:6%"><strong>{{$user->email}}</strong></h4>

    
    <h4 style="margin-left:6%">
    <br>
    <p><strong>Gender:</strong> {{ $user->gender->name }}</p>
    </h4>
    <br>
    <h4 style="margin-left:6%"> 
    <strong>Position:</strong>
    @foreach( $user->user_roles()->get() as $user_role )
        {{ $user_role->role->name . ', ' }}
    @endforeach
    </h4>
    <br>
    @foreach( $user->contacts()->get() as $contact )
    <h4 style="margin-left:6%"><strong>Contact:</strong>  
    {{ $contact->contact_type->name . ': ' . $contact->number }}
    </h4>
    @endforeach
    <br>
    @foreach( $user->address()->get() as $addr )
    <h4 style="margin-left:6%"><strong> Address:</strong>
    {{ $addr->street . ' ' . $addr->unit_no . ' blah blah..' }}
    </h4>                         
    @endforeach
    <br>
    <h4 style="margin-left:6%"><strong>Department:</strong> {{ $user->department->name }}</h4>
    </div>
</header>
<section>
  <h1 class="bottom"></h1>
</section>
<a href="{{route('edit-user', ['user_id'=>$user->id])}}">
    <button type="button" class="btn btn-default btn-circle btn-xl">
    <i class="glyphicon glyphicon-pencil"></i></button></a>
</div>
</div>



    <!-- <div class="container">
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
                            @endforeach

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
    </div> -->
@endsection
