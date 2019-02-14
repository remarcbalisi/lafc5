@extends('hrm.layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection