@extends('layouts.frontpage')

@section('content')

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

    <div class="logo">
        <img src="images/logo.png">
    </div>
    <div class="black-bar"></div>
    <div class="img"><div class="black-img">Fiercecom Inc.</div></div>


@endsection