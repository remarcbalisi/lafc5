@extends('hrm.layouts.app')

@section('content')

<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>



<div class="reportwrapper">
  <div class="reportwrapper__role">
    <p>Leave Request Lists</p>
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
            <p>Name</p>
          </th>
          <th>
            <p>Status</p>
          </th>
          <th>
            <p>Department</p>
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
                <p class="name">{{$leave_request->getOwner($leave_request->id)->fname}} {{$leave_request->getOwner($leave_request->id)->lname}}</p>
                <p class="designation">ID #: {{$leave_request->id}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">{{$leave_request->leave_status->name}}</p>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">{{$leave_request->getOwner($leave_request->id)->department->name}}</p>
            </div>
          </td>

          <td>
        
          </td>

          <td>
          <a href="{{route('hrm-leave-view', ['leave_request_id'=>$leave_request->id])}}">
          <button type="button" class="btn btn-info btn-m">View</button></a>
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
                    <div class="panel-heading">Dashboard</div>

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
                                <th scope="col">Requestor</th>
                                <th scope="col">Department</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leave_requests as $leave_request)
                                <tr>
                                    <th scope="row">{{$leave_request->id}}</th>
                                    <td>{{$leave_request->getOwner($leave_request->id)->fname}} {{$leave_request->getOwner($leave_request->id)->lname}}</td>
                                    <td>{{$leave_request->getOwner($leave_request->id)->department->name}}</td>
                                    <td>{{$leave_request->leave_status->name}}</td>
                                    <td>
                                        <a href="{{route('hrm-leave-view', ['leave_request_id'=>$leave_request->id])}}"><button type="button" class="btn btn-info btn-sm">View</button></a>
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
