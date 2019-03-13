@extends('agent.layouts.app')

@section('content')
    <div class="logo">
        <img src="/images/logo.png">
    </div>
    <div class="black-bar"></div>
    <div class="bg"><div>

    <div class="container" style="margin-top: 5%;">
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

                        <p><strong>Approved by: </strong>
                            @foreach($leave_request->user_leave()->where('approved_by', '!=', null)->get() as $user_leave)
                                <span class="badge badge-secondary">{{$user_leave->direct_approver->fname}} {{$user_leave->direct_approver->lname}}</span>
                            @endforeach
                        </p>
                        <p><strong>Disapproved by: </strong>
                            @foreach($leave_request->user_leave()->where('disapproved_by', '!=', null)->get() as $user_leave)
                                <span class="badge badge-secondary">{{$user_leave->direct_approver->fname}} {{$user_leave->direct_approver->lname}}</span>
                            @endforeach
                        </p>
                        <p><strong>Requestor: </strong>{{$leave_request->getOwner($leave_request->id)->fname}} {{$leave_request->getOwner($leave_request->id)->lname}}</p>
                        <p><strong>Department: </strong>{{$leave_request->getOwner($leave_request->id)->department->name}}</p>
                        <p><strong>Type: </strong>{{$leave_request->leave_type->name}}</p>
                        <p><strong>Status: </strong>{{$leave_request->leave_status->name}}</p>
                        <p><strong>Date Applied: </strong>{{$leave_request->dateFormat($leave_request->date_applied)}}</p>
                        <p><strong>Start Date: </strong>{{$leave_request->dateFormat($leave_request->leave_start_date)}}</p>
                        <p><strong>End Date: </strong>{{$leave_request->dateFormat($leave_request->leave_end_date)}}</p>
                        <p><strong>Address: </strong>{{$leave_request->leave_address}}</p>
                        <p><strong>Contact: </strong>{{$leave_request->contact}}</p>

                            @if( $leave_request->user_leave()->where(['direct_approver_id'=>Auth::user()->id, 'leave_id'=>$leave_request->id])->first() )
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#approve-disapprove">Approve/Disapprove</button>

                                <!-- Approve/Disapprove Modal -->
                                <form action="{{route('agent-leave-approve-disapprove', ['leave_request_id'=>$leave_request->id])}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal fade" id="approve-disapprove" tabindex="-1" role="dialog" aria-labelledby="Approve/Disapprove" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="1" id="approved_dis-1" name="approve_disapprove" class="custom-control-input">
                                                        <label class="custom-control-label" for="approved_dis-1">Approve</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="0" id="approved_dis-2" name="approve_disapprove" class="custom-control-input">
                                                        <label class="custom-control-label" for="approved_dis-2">Disapprove</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="note">Note</label>
                                                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
