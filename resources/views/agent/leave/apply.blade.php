@extends('agent.layouts.app')

@section('content')

    <style>

        h3{
            border:1px solid #4caf50;
            background-color:#4caf50;
            margin-top:0;
            height:7.5%;
            text-align:left;
            color:white;
            padding-top:13px;
            padding-left:30px;

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

        .date, .form-control{
            padding:9px;
            font-size:18px;
            text-align:left;
            border-width:2px;
            border-radius:6px;
            border-style:outset;
            border-color:#0db520;
            opacity:76%;

        }

    </style>

    <div class="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>
    <div class="black-bar"></div>
    <div class="bg">

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
                <h3>Apply Leave</h3>

                <div class="form-group" >
                    <label>Leave Type</label>
                    <select class="form-control input-lg" name="leave_type">
                        @foreach($leave_types as $leave_type)
                            <option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid-container">
                    <div class="grid-item">
                        <label>Start Date</label>
                        <input name="start_date" class="date" type="date">
                    </div>

                    <div class="grid-item">
                        <label>End Date</label>
                        <input name="end_date" class="date" type="date">
                    </div>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input name="leave_address" value="{{($user->concatAddress()) ? $user->concatAddress()[0] : 'N/A'}}" type="text" class="form-control input-lg">
                </div>

                <div class="form-group">
                    <label>Contact number</label>
                    <input type="text" name="contact" value="{{$contact->country_code . ' ' . $contact->number}}" class="form-control input-lg">
                </div>

                <div class="form-group">
                    <label for="note">Note:</label>
                    <textarea name="note" class="form-control" rows="5" id="note"></textarea>
                </div>

                <button type="submit" >Apply</button>
            </form>


    </div>


@endsection