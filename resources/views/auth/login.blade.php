@extends('layouts.login')

@section('content')
<div class="d-flex h-100 align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-body">
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
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="glowBox">
                                <h4 class="title">Log In</h4>
                                <div class="socialMedia">
                                    <a href="#" class="btn btn-just-icon btn-link">
                                                    <i class="fab fa-facebook-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-just-icon btn-link">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-just-icon btn-link">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        
                            <div class="desc text-center">
                                <p>Log In now to use our services!</p>
                            </div>

                            <div class="signUp">
                                <span>
                                    <input type="text" class="form" name="email" placeholder="Email/Username" autocomplete="off" style="cursor: auto;">
                                    <span class="underline"></span>
                                </span>
                                <span>
                                    <input type="password" name="password" class="form" placeholder="Password" autocomplete="off" style="cursor: auto;">
                                    <span class="underline"></span>
                                </span>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Log In</button>
                            </div>
                        </form>
                        <div class="create"><a href="{{ route('register') }}">Or create Account</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
