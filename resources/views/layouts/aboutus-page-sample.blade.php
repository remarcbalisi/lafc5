<html>
<head>
    <title>About Us page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


      <!-- Styles -->
    <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">
    <!-- card style -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                <div class="container">
                  <p>Feircecom</p>
                    <h1 class="title1">ACCOUNT LOGIN</h1>
                      <form>
                          <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                          </div>
                          <div class="form-group">
                          <label for="pwd">Password</label>
                          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                          </div>
                          <button type="submit" >Submit</button>
                      </form>
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
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body" style="overflow:scroll; overflow-x:hidden;">
                  <div class="container">
                    <p>Feircecom</p>
                      <h1 class="title2">ACCOUNT SIGNUP</h1>
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
                                      <input type="date" class="form-control" id="birthdate"  name="birthdate">
                                    </div>
                                  </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="gender">Gender</label>
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
                                        <input type="date" class="form-control" id="datehired"  name="datehired">
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


