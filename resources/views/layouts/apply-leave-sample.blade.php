<html>
<head>
    <title>Apply Leave page</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <!-- form style -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
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

    <!-- Styles -->
    <link href="{{ asset('css/apply-leave-sample.css') }}" rel="stylesheet">

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
  background-color:#FAF2E1;
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

<body>

<div class="topnav">
  <div class="topnav-right">
    <a><i class="fas fa-envelope"></i>fiercecommail@mail.com</a>
    <a><i class="fas fa-phone-square"></i>+123 456 789</a>
    <a><i class="fas fa-map-marked-alt"></i>11th Flr, JY Square IT Center, Cebu City</a>
  </div>
</div>
<div class="bottomnav">
  <div class="bottomnav-left">
    <a href="#" class="">User List</a>
    <a href="#">Apply Leave</a>
    <a href="#">Leave Request</a>

<a href="#">
      <i style="font-size:24px" class="fa">&#xf0f3;</i>
    </a>
  </div>
</div>

@yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/apply-leave-sample.js') }}"></script>
</body>
</html>