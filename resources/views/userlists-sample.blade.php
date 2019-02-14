@extends('layouts.userlists-sample')

@section('content')

<div class="logo">
  <img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

<div class="reportwrapper">
  <div class="reportwrapper__role">
    <p>User Lists</p>
    <div class="grid-container">
  </div>
  </div>

  <div class="reportwrapper__table">
    <table border="0" cellspacing="0">
      <thead>
        <tr>
          <th>
            <p>Name</p>
          </th>
          <th>
            <p>Status</p>
          </th>
          <th>
            <p>Date applied</p>
          </th>
          <th>
            <p>Leave type</p>
          </th>
          
          <th>
            <p>&nbsp;</p>
          </th>
        </tr>
      </thead>
     
      <tbody>
        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">Regine Laguting</p>
                <p class="designation">ID #: 111</p>
                <p class="designation">IT department</p>
                <p class="location">lahug</p>
              </div>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">Active</p>
            </div>
          </td>
          <td>
            <div class="status">
              <p status="status">From feb 14, 2019 - To feb 15, 2019</p>
            </div>
          </td>
          <td>
            <div class="rate">
              <p status="status">Sick Leave</p>
            </div>
          </td>
          <td>
            <div class="extra">
            <div class="dropdown">
            <a href="#" class="dropbtn">
              <span class="glyphicon glyphicon-option-vertical"></span>
            </a>  
            <div class="dropdown-content">
                <a href="#"><span class="glyphicon glyphicon-pencil"></span>&nbsp;View</a>
                <a href="#"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Edit</a>
                <a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Suspend</a>
            </div>
          </div>
            </div>
          </td>
        </tr>

        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">Regine Laguting</p>
                <p class="designation">ID #: 111</p>
                <p class="designation">IT department</p>
                <p class="location">lahug</p>
              </div>
            </div>
          </td>
          <td>
          <div class="status">
              <p status="status">Active</p>
            </div>
          </td>
          <td>
            <div class="status">
            <p status="status">From feb 14, 2019 - To feb 15, 2019</p>
            </div>
          </td>
          <td>
            <div class="rate">
              <p status="status">Sick leave</p>
            </div>
          </td>
          <td>
            <div class="extra">
            <div class="dropdown">
            <a href="#" class="dropbtn">
              <span class="glyphicon glyphicon-option-vertical"></span>
            </a>  
            <div class="dropdown-content">
                <a href="#"><span class="glyphicon glyphicon-pencil"></span>&nbsp;View</a>
                <a href="#"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Edit</a>
                <a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Suspend</a>
            </div>
          </div>
            </div>
          </td>
        </tr>

        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">Regine Laguting</p>
                <p class="designation">ID #: 111</p>
                <p class="designation">IT department</p>
                <p class="location">lahug</p>
              </div>
            </div>
          </td>
          <td>
          <div class="status">
              <p status="status">Active</p>
            </div>
          </td>
          <td>
            <div class="status">
            <p status="status">From feb 14, 2019 - To feb 15, 2019</p>
            </div>
          </td>
          <td>
            <div class="rate">
              <p status="status">Sick leave</p>
            </div>
          </td>
          <td>
            <div class="extra">
            <div class="dropdown">
            <a href="#" class="dropbtn">
              <span class="glyphicon glyphicon-option-vertical"></span>
            </a>  
            <div class="dropdown-content">
                <a href="#"><span class="glyphicon glyphicon-pencil"></span>&nbsp;View</a>
                <a href="#"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Edit</a>
                <a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Suspend</a>
            </div>
          </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    
</div>

<div class="pagination">
  <a href="#" class="nxt">Prev</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#" class="nxt">Next</a>
</div>
</div>

<style>
.pagination {
  display: inline-block;
  margin-left:30%;
}

.pagination a {
font-weight:bolder;
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}
.nxt{
border:1px solid white;
background-color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

  
  
<!-- 
</div>
</div> -->

@endsection