@extends('agent.layouts.app')

@section('content')

<style>
  
h1{
  margin-bottom:10%;
 
}
button{
  outline: none;
  background:#09A603;
  width: 30%;
  border: 0;
  border-radius: 4px;
  padding: 12px 20px;
  color: #FFFFFF;
  font-family: inherit;
  font-size: inherit;
  font-weight: 500;
  line-height: inherit;
  text-transform: uppercase;
  cursor: pointer;
  margin-left:37%;
  margin-top:6%;  
  margin-bottom:6%;   
  letter-spacing:5px; 

}

 .form-control{
  padding:9px;
  font-size:18px;
  text-align:left;
  -webkit-box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69); 
  box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69);
    
}
</style>

<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>



<div>
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

<form class="form" action="{{route('agent-leave-apply-store')}}" method="POST">
             {{ csrf_field() }}

      <h1></h1>

      <div class="form-group" >
      <label>Leave Type</label>
      <select class="form-control input-lg" name="leave_type" id="leave_type">
            @foreach($leave_types as $leave_type)
                <option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
            @endforeach
        </select>
      </div>

        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control  input-lg" name="start_date" value="" />
        </div>

        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control  input-lg" name="end_date" value="" />
        </div>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control input-lg" type="text" name="leave_address" 
        value="{{!empty($user->concatAddress()[0]) ? $user->concatAddress()[0] : 'N/A'}}" class="form-control" id="leave_address" placeholder="Address">
      </div>

      <div class="form-group">
      <label for="contact">Contact</label>
            <input class="form-control input-lg" type="text" name="contact" value="{{ !empty($contact) ?  $contact->country_code . ' ' . $contact->number : 'N/A'}}"
            class="form-control" id="contact" placeholder="Contact" >
      </div>

      <div class="form-group">
        <label for="comment">Note:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>

      <button type="submit" class="btn btn-success">Apply</button>
  </form>

  </div>



    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! Agent
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
