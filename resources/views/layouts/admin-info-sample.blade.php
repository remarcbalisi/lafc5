<html>
<head>
    <title>Admin Info. page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

     <!-- Styles -->
     <link href="{{ asset('css/admin-user-info-sample.css') }}" rel="stylesheet">

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
}
.logo {
  position: absolute;
  top: 20px;
  left: 5%;
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
    <a><i class="fas fa-map-marked-alt"></i>434 Street, JY</a>
  </div>
</div>
<div class="bottomnav">
  <div class="bottomnav-left">
    <a href="#" class="">Apply Leave</a>
    <a href="#">User Info.</a>
  </div>
</div>



@yield('content')
</body>
</html>