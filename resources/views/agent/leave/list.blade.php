@extends('agent.layouts.app')

@section('content')
<style>
.reportwrapper {
  max-width: 900px;
  width: 100%;
  position: relative;
  left: 50%;
  margin-top: 5%;
  margin-bottom:20%;
  transform: translateX(-50%);
  border-radius: 4px;
  box-shadow: 0px 0px 16px 13px rgba(0, 0, 0, 0.1);

}
.reportwrapper__role {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  background: #4caf50;
  padding: 10% 10% 10% 8%;
}
.reportwrapper__role p {
  color: #fff;
  font-size: 25px;
  font-weight: 300;
  position: relative;
}
.reportwrapper__role p::before {
  content: "+";
  position: absolute;
  display: block;
  left: -40px;
}
.reportwrapper__table table {
  width: 100%;
  border-collapse: collapse;
}
.reportwrapper__table table thead {
  padding: 10px;
  background: #4caf50;
}
.reportwrapper__table table thead tr > th {
  text-align: left;
  padding: 20px;
}
.reportwrapper__table table thead p {
  color: #f1f1f1;
  font-weight: 400;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: bold;
}
.reportwrapper__table table tbody tr:not(:last-child) {
  border-bottom: 1px solid #dedbdb;
}
.reportwrapper__table table tbody tr > td {
  text-align: left;
  padding: 20px;
}

.reportwrapper__table table tbody tr:hover{
  background-color: rgb(231, 238, 231);
}

.reportwrapper__table table tbody tr .item .g,
.reportwrapper__table table tbody tr .item .i {
  display: inline-block;
  vertical-align: middle;
}
.reportwrapper__table table tbody tr .item .i {
  margin-left: 10px;
}
.reportwrapper__table table tbody{
  background-color:white; 
}
.reportwrapper__table table tbody tr .item p.name {
  text-transform: capitalize;
  font-weight: 600;
  color: #333;
}
.reportwrapper__table table tbody tr .item p.designation {
  font-weight: 400;
  color: #a9a7a7;
  font-size: 12px;
}
.reportwrapper__table table tbody tr .item p.location {
  color: #a9a7a7;
  font-size: 12px;
  text-transform: capitalize;
}
.reportwrapper__table table tbody tr .rate p {
  font-weight: 600;
}
.reportwrapper__table table tbody tr .rate p span {
  margin-left: 5px;
  font-weight: 300;
  font-size: 11px;
}
.reportwrapper__table table tbody tr .extra button {
  border: 0px;
  box-shadow: none;
}
.reportwrapper__table table tbody tr .extra button span {
  display: block;
  width: 5px;
  height: 5px;
  background: #a9a7a7;
  border-radius: 50%;
}
.reportwrapper__table table tbody tr .extra button span::after, .wrapper__table table tbody tr .extra button span::before {
  content: "";
  position: absolute;
  width: 5px;
  height: 5px;
  background: #a9a7a7;
  border-radius: 50%;
}
.reportwrapper__table table tbody tr .extra button span::after {
  margin-left: 5px;
}
.reportwrapper__table table tbody tr .extra button span::before {
  margin-left: -10px;
}

p[status] {
  position: relative;
  color: #888585;
  font-weight: 400;
  font-size: 14px;
}
p[status]::before {
  content: "";
  width: 8px;
  height: 8px;
  background: #81dc3f;
  border-radius: 50%;
  left: -12px;
  position: absolute;
  top: 0;
  bottom: 0;
  margin-top: auto;
  margin-bottom: auto;
}


    </style>

<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


<div class="reportwrapper">
  <div class="reportwrapper__role">
    <p>My Leave Requests</p>
    <div class="grid-container">
  </div>

  @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
  @endif
  </div>

  <div class="reportwrapper__table">
    <table border="0" cellspacing="0">
      <thead>
        <tr>
          <th>
            <p>#</p>
          </th>
          <th>
            <p>Range</p>
          </th>
          <th>
            <p>Status</p>
          </th>
          <th>
            <p>Status</p>
          </th>
        </tr>
      </thead>
    
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

      <tbody>
      @foreach($leave_requests as $leave_request)
        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">{{$leave_request->leave->id}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">
                {{$leave_request->leave->dateFormat($leave_request->leave_start_date)}} - {{$leave_request->leave->dateFormat($leave_request->leave_end_date)}}</p>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">{{$leave_request->leave->leave_status->name}}</p>
            </div>
          </td>
          <td>
            <div class="rate">
              <p status="status">
                <a href="{{route('agent-leave-view', ['leave_request_id'=>$leave_request->leave->id])}}">
                <button type="button" class="btn btn-info btn-sm">View
                </button></a></p>
            </div>
            @endforeach
          </td>
          
        </tr>
      </tbody>
    </table> 
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
