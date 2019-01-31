@extends('layouts.userlists-sample')

@section('content')

<div class="logo">
  <img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


<table id="user-table">
  <tr>
    <th>Employee ID</th>
    <th>Name</th>
    <th>Status</th>
    <th></th>
  </tr>
  <tr>
    <td>123-regine</td>
    <td>Maria Anders</td>
    <td>Active</td>
    <td>
    <div class="dropdown">
        <a href="#" class="dropbtn">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
        <!-- <button class="dropbtn">Dropdown</button> -->
    <div class="dropdown-content">
    <a href="#">View</a>
    <a href="#">Edit</a>
    <a href="#">Suspend</a>
    </div>
  </div>
  </td>
  </tr>
  <tr>
    <td>345-remarc</td>
    <td>Christina Berglund</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>22-Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>444-Handel</td>
    <td>Roland Mendel</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>222-Trading</td>
    <td>Helen Bennett</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>345-Essen</td>
    <td>Philip Cramer</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>121-Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>101-Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>456-South</td>
    <td>Simon Crowther</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
  <tr>
    <td>88-spécialités</td>
    <td>Marie Bertrand</td>
    <td>Active</td>
    <td>
        <a href="#">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
    </td>
  </tr>
</table>


</div>
</div>

@endsection