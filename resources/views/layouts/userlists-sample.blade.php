<html>
<head>
    <title>User Lists page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

     <!-- Styles -->
     <link href="{{ asset('css/userlist-sample.css') }}" rel="stylesheet">

     <!-- icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
    

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

#user-table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 70%;
    box-shadow:  0 30px 40px 0 rgba(0,0,0,0.25);
    background-color:white;
    margin-left:15%;
    margin-top:7%;
    margin-bottom:10%;

  }
  
  #user-table td, #user-table th {
    padding: 15px;
  }
  
  #user-table tr:hover {
      background-color: #ddd;
    }
  
  #user-table th {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
   
  }

  .dropbtn {
  /* background-color: #4CAF50; */
  /* color: white; */
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* .dropdown {
  position: relative;
  display: inline-block;
} */

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}


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
    <a href="#home" class="">User List</a>
    <a href="#">Apply Leave</a>
    <a href="#">Leave Request</a>
    <a href="#">
      <i style="font-size:24px" class="fa">&#xf0f3;</i>
    </a>
    
  </div>
</div>



@yield('content')


</body>
</html>