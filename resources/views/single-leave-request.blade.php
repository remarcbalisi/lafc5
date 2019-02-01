@extends('layouts.app-copy')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Leave Request</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p><strong>Requestor: </strong>{{$leave_request->getOwner($leave_request->id)->fname}} {{$leave_request->getOwner($leave_request->id)->lname}}</p>
                        <p><strong>Department: </strong>{{$leave_request->getOwner($leave_request->id)->department->name}}</p>
                        <p><strong>Type: </strong>{{$leave_request->leave_type->name}}</p>
                        <p><strong>Status: </strong>{{$leave_request->leave_status->name}}</p>
                        <p><strong>Date Applied: </strong>{{$leave_request->dateFormat($leave_request->date_applied)}}</p>
                        <p><strong>Start Date: </strong>{{$leave_request->dateFormat($leave_request->leave_start_date)}}</p>
                        <p><strong>End Date: </strong>{{$leave_request->dateFormat($leave_request->leave_end_date)}}</p>
                        <p><strong>Address: </strong>{{$leave_request->leave_address}}</p>
                        <p><strong>Contact: </strong>{{$leave_request->contact}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
