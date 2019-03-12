<html>
<head>
    <title>First page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <!-- Styles -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     
     <!-- date picker style -->
     <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Styles -->
    <link href="{{ asset('css/frontpage-sample.css') }}" rel="stylesheet">

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
  left:1%;
}
.logo img {
  display: inline-block;
  height: 80px;
  width: auto;
  vertical-align: center; 
}
.img {
  background: black url("images/agreement.jpg") no-repeat center;
  background-size: cover;
  width: 100vw;
  
}

.img .black-img {
	font-size: 10em;
	line-height: 1em;
	margin-left: 1%;
	mix-blend-mode: overlay;
	text-align: center;
	text-transform: uppercase;
}

.black-img {
  height: 100%;
  width: 100%;
  align-items: center;
  justify-content: center;
  font-size: 3em;
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

.modal-content{
    height:80%;
    width:900px;
    margin-left:-20%;
}

.form-control {
    width:65%;
    display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 0 0 20px;
}

label{
  display: block;
  margin: 0 0 10px;
  color: rgba(0, 0, 0, 0.6);
  font-size: 12px;
  font-weight: 500;
  line-height: 1;
  text-transform: uppercase;
  letter-spacing: .2em;
}

 .form-control{
  font-family: inherit;
  font-size: inherit;
  font-weight: 600;
  -webkit-box-shadow: 1px 6px 15px 5px rgba(186,186,186,0.67); 
  box-shadow: 1px 6px 15px 5px rgba(186,186,186,0.67);
  transition: 0.3s ease;
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
  margin-left:20%;
  margin-top:5%;   
  letter-spacing:5px; 

}


.title2{
    font-weight:bolder;
    color:white;
    font-family: "Francois One", sans-serif;
    font-size: 3rem;
    line-height: 1.2;
    margin-left:46%;  
}

form{
    margin-top:5%;
   
    
}



.modal-header{
    border-style:none;
   
}

.modal-header .close{
    margin-right:-14%;
    font-size:30px;
    
}


.p {
  writing-mode: vertical-rl;
  text-orientation: upright;
  text-transform: uppercase;
  font-family: sans-serif;
  font-size:30px;
  margin-left:72%;
  color:white;
  letter-spacing:10px;
  font-weight:bolder;

}

* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}


.col-4 {
  width: 33.33%;
  background-color:#09A603;
  height:100%;
  margin-top:-8.2%;
}

.col-8 {
  width: 66.66%;
}

.signin{
text-align:center;
font-weight:bolder;
color:#6F777D;
}

.form-signin{
  margin-left:23%;
}

.left-text{
  margin-top:15%;
  color:white;
  font-weight:bolder;
  text-align:center;
}

.content{
  color:white;
  margin-top:10%;
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
  <div class="button">
	<a class="btn-open" href="#">About Us</a>
</div>
    <!-- <a href="#" class="">About Us</a> -->
    <a href="#" data-toggle="modal" data-target="#myModal">Log In</a>
    <a href="#Modal" data-toggle="modal" data-target="#Modal">Sign Up</a>
  </div>
</div>

<!-- log in -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <!-- <div class="container"> -->
                    <div class="row">
                      <div class="col-4 menu">
                          <h1 class="left-text">Fiercecom</h1>
                        <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                          Donec gravida elit mi, eget condimentum nulla faucibus vitae. 
                         </p>
                        <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida
                           elit mi, eget condimentum nulla faucibus vitae.</p>
                      </div>

                      <div class="col-8">
                        <h1 class="signin">Log In</h1>
                        <div class="row">
                        <form class="form-signin">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"  name="email">
                            </div>
                            <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                            </div>
                            <button type="submit" >Log In</button>
                            
                        </form> 
                      </div>
                    </div>
                  
                </div>
            </div>    
          </div>
      </div>
  </div>
      <!--log in end  -->

      <!-- sign up -->
  <div class="modal fade" id="Modal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content" style="overflow:scroll; overflow-x:hidden;">
              <div class="modal-header" style=" background-color:#09A603;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="title2">Sign Up</h1>
              </div>

              <div class="modal-body">
                  <div class="container">
                        <form>
                            <!-- <div class="container-fluid"> -->

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="fname">First name</label>
                                      <input type="text" class="form-control" id="fname"  name="fname">
                                    </div>    
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Mname">Middle name</label>
                                        <input type="text" class="form-control" id="Mname"  name="Mname">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Lname">Last name</label>
                                        <input type="text" class="form-control" id="Lname"  name="Lname">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="birthdate">Birthdate</label>
                                      <input type="text" class="form-control" name="birthday" value="10/24/1984" />

                                          <script>
                                          $(function() {
                                            $('input[name="birthday"]').daterangepicker({
                                              singleDatePicker: true,
                                              showDropdowns: true,
                                              minYear: 1901,
                                              maxYear: parseInt(moment().format('YYYY'),10)
                                            }, function(start, end, label) {
                                              var years = moment().diff(start, 'years');
                                              alert("You are " + years + " years old!");
                                            });
                                          });
                                          </script>
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                    <label>Gender</label>
                                        <select class="form-control">
                                            <option>Male</option>
                                            <option>Famle</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="gender">Team Leader</label>
                                      <select class="form-control">
                                          <option>Regine</option>
                                          <option>Remarc</option>
                                          <option>Julven</option>
                                          <option>Fretzie</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="id">Employee ID</label>
                                      <input type="number" class="form-control" id="id"  name="id">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="datehired">Date Hired</label>
                                        <input type="text" class="form-control" name="birthday" value="10/24/1984" />
                                          <script>
                                          $(function() {
                                            $('input[name="birthday"]').daterangepicker({
                                              singleDatePicker: true,
                                              showDropdowns: true,
                                              minYear: 1901,
                                              maxYear: parseInt(moment().format('YYYY'),10)
                                            }, function(start, end, label) {
                                              var years = moment().diff(start, 'years');
                                              alert("You are " + years + " years old!");
                                            });
                                          });
                                          </script>
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="title">Job Title</label>
                                      <select class="form-control">
                                          <option>Admin</option>
                                          <option>HR Manager</option>
                                          <option>Team Manager</option>
                                          <option>Agent</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="form-group">
                                      <label for="Department">Department</label>
                                        <select class="form-control">
                                            <option>IT</option>
                                            <option>Human Resource</option> 
                                        </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Phone no.</label>
                                        <input type="number" class="form-control">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Telephone no.</label>
                                        <input type="number" class="form-control">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="username">Username</label>
                                      <input type="username" class="form-control" id="username"  name="username">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"  name="email">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"  name="password">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password"  name="password">
                                  </div>
                                </div>
                              </div>

                              <h3 style="font-weight:bold;">Current Address</h3>
                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>Street</label>
                                      <input type="text" class="form-control" id="fname"  name="fname">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Mname">Unit no.</label>
                                        <input type="text" class="form-control" id="Mname"  name="Mname">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Brgy</label>
                                        <input type="text" class="form-control" id="Lname"  name="Lname">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" class="form-control" id="fname"  name="fname">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" class="form-control" id="Mname"  name="Mname">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" id="Lname"  name="Lname">
                                    </div>
                                  </div>
                              </div>

                              <h3 style="font-weight:bold;">Permanent Address</h3>
                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>Street</label>
                                      <input type="text" class="form-control" id="fname"  name="fname">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Mname">Unit no.</label>
                                        <input type="text" class="form-control" id="Mname"  name="Mname">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Brgy</label>
                                        <input type="text" class="form-control" id="Lname"  name="Lname">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" class="form-control" id="fname"  name="fname">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" class="form-control" id="Mname"  name="Mname">
                                      </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" id="Lname"  name="Lname">
                                    </div>
                                  </div>
                              </div>
                              <button type="submit" >Submit</button>
                            <!-- </div> -->
                        </form>
                  </div>
              </div>  
            </div>
        </div>
  </div>
<!-- sign up end -->
   
  

@yield('content')

  <!-- Scripts -->
  <!-- <script src="{{ asset('js/frontpage-sample.js') }}"></script> -->
</body>
</html>


