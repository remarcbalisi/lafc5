@extends('layouts.app-copy')

@section('content')


<div class="logo">
  <img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


<div class="reportwrapper">
  <div class="reportwrapper__role">
  <span class="button"><a href="{{route('create-new-user')}}"><button type="button" class="btn btn-primary btn-circle btn-lg">
    <i class="glyphicon glyphicon-plus"></i></button></a></span>
    <span class="text"><p>User Lists</p></span>
    <div class="grid-container">
  </div>
  </div>

  <div class="reportwrapper__table">
    <table border="0" cellspacing="0">
      <thead>
        <tr>
          <th>
            <p>Name</p>
          </th>
         
          <th>
            <p></p>
          </th>
          <th>
            <p>Status</p>
          </th>
          <th>
            <p style="margin-left:15%">Action</p>
          </th>
          
          <th>
            <p>&nbsp;</p>
          </th>
        </tr>
      </thead>
     
      <tbody>
        <tr class="t-row">
        @foreach( $users as $user )
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">{{$user->fname . ' ' . $user->lname}}</p>
                <p class="designation">ID #: {{$user->employee_id}}</p>
                <!-- <p class="designation">IT department</p>
                <p class="location">lahug</p> -->
              </div>
            </div>
          </td>
          <td>
          </td>
          <td>
          <div class="status">
              <p status="status">
               @foreach( $user->user_status()->get() as $u_status )
                  {{$u_status->status->name . ', '}}
                  @endforeach</p>
            </div>
          </td>
          <td>
            <div class="rate">
            <a href="{{route('view-single-user', ['user_id'=>$user->id])}}">
              <button type="button" class="btn btn-primary btn-sm">Preview</button>
              </a>
            
              <a href="#"
                    onclick="event.preventDefault();
                                document.getElementById('user-status-form-{{$user->id}}').submit();">
              <button type="button" class="btn btn-primary btn-sm">{{( $user->user_status()->where(['user_id'=>$user->id, 'status_id'=>3])->first() ) ? 'Unsuspend' : 'Suspend'}}</button>
              </a>
                <form id="user-status-form-{{$user->id}}" action="{{route('update-user-status')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input name="user_id" type="hidden" value="{{$user->id}}">
                    <input name="status" type="hidden" value="{{( $user->user_status()->where(['user_id'=>$user->id, 'status_id'=>3])->first() ) ? 'unsuspend' : 'suspend'}}">
                </form>
            </div>
          </td>
          <td>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>  
</div>
</div>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Employee ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $users as $user )
                        <tr>
                          <th scope="row">{{$user->employee_id}}</th>
                          <td>{{$user->fname . ' ' . $user->lname}}</td>
                          <td>
                            @foreach( $user->user_status()->get() as $u_status )
                            {{$u_status->status->name . ', '}}
                            @endforeach
                          </td>
                          <td>
                          <a href="{{route('view-single-user', ['user_id'=>$user->id])}}">
                          <button type="button" class="btn btn-primary btn-sm">Preview</button>
                          </a>
                        
                          <a href="#"
                                onclick="event.preventDefault();
                                            document.getElementById('user-status-form-{{$user->id}}').submit();">
                          <button type="button" class="btn btn-primary btn-sm">{{( $user->user_status()->where(['user_id'=>$user->id, 'status_id'=>3])->first() ) ? 'Unsuspend' : 'Suspend'}}</button>
                          </a>
                            <form id="user-status-form-{{$user->id}}" action="{{route('update-user-status')}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input name="user_id" type="hidden" value="{{$user->id}}">
                                <input name="status" type="hidden" value="{{( $user->user_status()->where(['user_id'=>$user->id, 'status_id'=>3])->first() ) ? 'unsuspend' : 'suspend'}}">
                            </form>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection