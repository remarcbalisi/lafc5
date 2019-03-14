@extends('agent.layouts.app')

@section('content')
<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


<div class="reportwrapper" style="margin-top:5%">
  <div class="reportwrapper__role">
    <p>My Leave Lists</p>
    <div class="grid-container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  </div>
  </div>

  <div class="reportwrapper__table">
    <table border="0" cellspacing="0">
      <thead>
        <tr>
          <th>
            <p>Range</p>
          </th>
          <th>
            <p>Status</p>
          </th>
          <th>
           
          </th>

          <th>

          </th>
          
          <th>
            <p>Action</p>
          </th>
        </tr>
      </thead>
     
      <tbody>
      @foreach($leave_requests as $leave_request)
        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">{{$leave_request->leave->dateFormat($leave_request->leave_start_date)}} - {{$leave_request->leave->dateFormat($leave_request->leave_end_date)}}</p>
                <p class="designation">ID #: {{$leave_request->id}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">{{$leave_request->leave->leave_status->name}}</p>
            </div>
          </td>
          <td>
           
          </td>

          <td>
        
          </td>

          <td>
          <a href="{{route('agent-leave-view', ['leave_request_id'=>$leave_request->leave->id])}}">
          <button type="button" class="btn btn-info btn-md">View</button></a>
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
                    <div class="panel-heading">My Leave Requests</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Range</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leave_requests as $leave_request)
                                <tr>
                                    <th scope="row">{{$leave_request->leave->id}}</th>
                                    <td style="max-width: 20px;">{{$leave_request->leave->dateFormat($leave_request->leave_start_date)}} - {{$leave_request->leave->dateFormat($leave_request->leave_end_date)}}</td>
                                    <td>{{$leave_request->leave->leave_status->name}}</td>
                                    <td>
                                        <a href="{{route('agent-leave-view', ['leave_request_id'=>$leave_request->leave->id])}}"><button type="button" class="btn btn-info btn-sm">View</button></a>
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
