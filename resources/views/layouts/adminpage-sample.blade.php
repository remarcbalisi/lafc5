<html>
<head>
    <title>Adminpage</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <!-- report style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- icon style -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/admin-sample.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reports.css') }}" rel="stylesheet">


<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  overflow:hidden;
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
    margin-left:30%;
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
  left:3%;
}

.logo img {
  display: inline-block;
  height: 80px;
  width: auto;
  vertical-align: center;
}
.bg {
  background: black url("https://finoraconsulting.com/wp-content/uploads/2018/09/cropped-shutterstock_368205530-5386x2693-1.jpg") no-repeat center;
  background-size: cover;
  height: calc(100vh - 120px);
  width: 100vw;
  overflow-x: hidden;
}

.report {
  background-color:#FFEEAD;
  background-repeat: no-repeat;
  background-size: cover;
  /* height: calc(100vh - 120px); */
  width: 100vw;
  overflow-x: hidden;
  
}

.black-bar {
  position: absolute;
  width: 50%;
  height: 65px;
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
            <a href="#">Reports</a>
            <a href="#">
              <i style="font-size:24px" drpdwn__point class="fa">&#xf0f3;</i>
              <!-- <div class="badge"><span class="w3-badge w3-red">8</span></div>  -->
            </a>   
        </div>  
    </div>  
      
      <div class="drpdwn">
        <div class="drpdwn__content">
            <a href="#">  
            <strong>Title</strong><br>
            notification content </a>
            <a href="#"> <strong>Title</strong><br>
            notification content </a>
            <a href="#"> <strong>Title</strong><br>
            notification content </a>
        </div>
    </div> 
     


@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/adminpage.js') }}"></script>
<script src="{{ asset('js/reports.js') }}"></script>


</body>
</html>