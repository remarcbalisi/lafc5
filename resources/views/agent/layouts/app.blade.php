<html>
<head>
    <title>Apply Leave page</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <!-- form style -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
 <!-- date picker style -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/apply-leave-sample.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/user-info-sample.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  position: relative;
  width: 100%;
}
.bottomnav {
  overflow: hidden;
  position: relative;
  width: 100%;
  background: white;
  margin-left:20%;
}

.topnav a,
.bottomnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 17px;
  min-width: 20px;
  transition: box-shadow 1s ease;
}
.topnav a i {
  float: left;
  line-height: 20px;
  margin-right: 10px;
  color: #ffffff;
}
.bottomnav a {
  color: black;
}
.topnav a.active,
.bottomnav a.active {
  color: red;
}
.topnav-right {
  float: right;
  position: relative;
}
.bottomnav-left{
    margin-left:0;
}
.bottomnav-left a:hover{
  background-color: #09A603;
  color: white;
}
.bottomnav {
  position: static;
  max-width:1064px;
  padding: 0px 15px;
  margin-left: 23%;
}
.topnav-right:before {
  position: absolute;
  content: '';
  left: -80px;
  top: 0px;
  border-top: 68px solid #09A603;
  border-left: 80px solid transparent;
}
.topnav {
  position: static;
  max-width: 900px;
  padding: 0px 15px;
  margin: 0 auto;
}
.topnav-right {
  background:#09A603;
  color:white;
}
.logo {
  position: absolute;
  top: 20px;
  left:3%;
}
.logo img {
  display: inline-block;
  height: 80px;
  width: auto;
  vertical-align: center;
}
.bg {
  background-color:#FAF2E1;
  background-repeat: no-repeat;
  background-size: cover;
  height: calc(100vh - 150px);
  width: 100vw;
  overflow: scroll;
  overflow-x: hidden;
}

.black-bar {
  position: absolute;
  width: 50%;
  height: 64px;
  background: #09A603;
  top: 0;
  right: 0;
  z-index: -1;
}
</style>


</head>
<body>

<!-- <div id="app"> -->

<div class="topnav">
  <div class="topnav-right">
    <a><i class="fas fa-envelope"></i>fiercecommail@mail.com</a>
    <a><i class="fas fa-phone-square"></i>+123 456 789</a>
    <a><i class="fas fa-map-marked-alt"></i>11th Flr, JY Square IT Center, Cebu City</a>
  </div>
</div>
<div class="bottomnav">
  <div class="bottomnav-left">
    <a href="{{route('agent-leave-apply')}}">Apply Leave</a>
    <a href="{{route('agent-leave-list')}}">Leave Request</a>


    <!-- <a role="button" aria-expanded="false" aria-haspopup="true" v-pre>
        {{ Auth::user()->fname }} <span class="badge badge-success" style="font-size:20px">{{Auth::user()->notifications()->where('is_read', false)->get()->count()}}</span> <span class="caret"></span>
    </a> -->

    <a  href="{{route('agent-notification-list')}}"><i  class="fa">&#xf0f3;</i>
    <span class="badge badge-success">{{Auth::user()->notifications()->where('is_read', false)->get()->count()}}</span></a>

    <a href="{{route('agent-view-single-user', ['user_id'=>Auth::user()->id])}}" style="margin-left:45%">
    <i class="material-icons">&#xe7fd;</i></a>

    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" >
        <i class="material-icons">&#xe890;</i></a>
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
  </div>
</div>



    <!-- <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                Collapsed Hamburger
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                Branding Image
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                Left Side Of Navbar
                <ul class="nav navbar-nav">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .topnav {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        .bottomnav {
            overflow: hidden;
            position: relative;
            width: 100%;
            background: white;
        }

        .topnav a,
        .bottomnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
            min-width: 20px;
            transition: box-shadow 1s ease;
        }
        .topnav a i {
            float: left;
            line-height: 20px;
            margin-right: 10px;
            color: #ffffff;
        }
        .bottomnav a {
            color: black;
        }
        .topnav a.active,
        .bottomnav a.active {
            color: red;
        }
        .topnav-right {
            float: right;
            position: relative;
        }
        .bottomnav-left{
            margin-left:40%;
        }
        .bottomnav-left a:hover{
            background-color: #09A603;
            color: white;
        }
        .bottomnav {
            position: static;
            max-width: 900px;
            padding: 0px 15px;
            margin: 0 auto;
        }
        .topnav-right:before {
            position: absolute;
            content: '';
            left: -80px;
            top: 0px;
            border-top: 68px solid #09A603;
            border-left: 80px solid transparent;
        }
        .topnav {
            position: static;
            max-width: 900px;
            padding: 0px 15px;
            margin: 0 auto;
        }
        .topnav-right {
            background:#09A603;
            color:white;
        }
        .logo {
            position: absolute;
            top: 20px;
            left:3%;
        }
        .logo img {
            display: inline-block;
            height: 80px;
            width: auto;
            vertical-align: center;
        }
        .bg {
            background-color:#FFEEAD;
            background-repeat: no-repeat;
            background-size: cover;
            /* height: calc(100vh - 120px); */
            width: 100vw;
            overflow: scroll;
            overflow-x: hidden;
        }

        .black-bar {
            position: absolute;
            width: 50%;
            height: 64px;
            background: #09A603;
            top: 0;
            right: 0;
            z-index: -1;
        }
    </style>

</head>

                Right Side Of Navbar
                <ul class="nav navbar-nav navbar-right">
                    Authentication Links
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->fname }} <span class="badge badge-success">{{Auth::user()->notifications()->where('is_read', false)->get()->count()}}</span> <span class="caret"></span>
                            </a>

<div class="topnav">
    <div class="topnav-right">
        <a><i class="fas fa-envelope"></i>fiercecommail@mail.com</a>
        <a><i class="fas fa-phone-square"></i>+123 456 789</a>
        <a><i class="fas fa-map-marked-alt"></i>11th Flr, JY Square IT Center, Cebu City</a>
    </div>
</div>
<div class="bottomnav">
    <div class="bottomnav-left">
        <a href="{{route('agent-leave-apply')}}">Apply Leave</a>
        <a href="{{route('agent-leave-list')}}"> My Leave Request</a>
        @if(Auth::user()->hasRole(\App\Role::where('id', 3)->first()))
        <a href="{{route('agent-leave-list')}}"> All Leave Request</a>
        @endif
        <a href="#">
            <i style="font-size:24px" class="fa">&#xf0f3;</i>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i style="font-size:24px" class="glyphicon glyphicon-log-out"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav> -->
 
   
<!-- </div> -->

@yield('content')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin-user-update.js') }}"></script>
<script src="{{ asset('js/apply-leave-sample.js') }}"></script>
</body>
</html>