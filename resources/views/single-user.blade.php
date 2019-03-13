@extends('layouts.app-copy')

@section('content')

<style>
  
button{
  outline: none;
  background:#09A603;
  width: 30%;
  border: 0;
  border-radius: 4px;
  padding: 12px 20px;
  font-family: inherit;
  font-size: inherit;
  font-weight: 500;
  line-height: inherit;
  text-transform: uppercase;
  cursor: pointer;
  margin-left:37%;
  margin-top:6%;     
  letter-spacing:5px; 

}

 .form-control{
  padding:9px;
  font-size:18px;
  text-align:left;
  -webkit-box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69); 
  box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69);
    
}
.leave-form{
  border:1px solid white;
  background-color:white;
  box-shadow:  0 30px 40px 0 rgba(0,0,0,0.25);
  margin-top:5%;
  width:70%;
  margin-left:15%;
  margin-bottom:5%;
  height:500px;
}

.leave-title{
border-bottom:1px solid #F2DABF;
background-image: linear-gradient(135deg,#F2DABF,#E8D1B7);
color:white;
height:15%;
text-align:center;
margin-top:-1%;
padding-top:2%;

}
</style>



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

<div>

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
</div> -->

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

<form class="leave-form" method="POST" action="{{route('update-user-leave-credits-increment', ['user_id'=>$user->id])}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
      <h2 class="leave-title"> Leave Credits </h2>

      <div class="form-group">
        <label for="leave_increment">Credits</label>
        <input type="text" class="form-control input-lg" name="leave_credits" value="{{$user->leave_credits}}" id="leave_credits" placeholder="Credits">
      </div>

      <div class="form-group">
        <label for="leave_increment">Increment</label>
        <input type="number" name="leave_increment" value="{{$user->leave_increment}}" class="form-control input-lg" id="leave_increment" placeholder="Increment">
    </div>
    <button type="submit" class="btn btn-warning">Update Now</button>
  </form>

<!-- <div class="container">
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
</div> -->

</div>
@endsection
