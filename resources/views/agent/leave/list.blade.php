@extends('agent.layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection
