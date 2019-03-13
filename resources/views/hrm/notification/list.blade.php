@extends('hrm.layouts.app')

@section('content')
<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Notifications</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach($notifications as $notification)
                                <li class="list-group-item">
                                    <a href="{{route('hrm-notification-view', ['notification_id'=>$notification->id])}}" style="{{(!$notification->is_read) ? 'color:darkblue' : 'color:burlywood'}}" href="#"><p>{{$notification->body}}</p></a>
                                    <small>{{$notification->dateFormat($notification->created_at)}}</small>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
