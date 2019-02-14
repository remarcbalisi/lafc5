@extends('layouts.userlists-sample')

@section('content')

<div class="logo">
  <img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

<table class="greenTable">
<thead>
<tr>
<th>Employee ID</th>
    <th>Name</th>
    <th>Status</th>
    <th></th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="4">
<div class="links"><a href="#">&laquo;</a> 
  <a class="active" href="#">1</a> 
  <a href="#">2</a> 
  <a href="#">3</a> 
  <a href="#">4</a> 
  <a href="#">&raquo;</a>
</div>
</td>
</tr>
</tfoot>
<tbody>
<tr>
  <td>cell1_1</td>
  <td>cell2_1</td>
  <td>cell3_1</td>
  <td>
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
  </td>
</tr>
<tr>
<td>cell1_2</td>
<td>cell2_2</td>
<td>cell3_2</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td>
</tr>
<tr>
<td>cell1_3</td>
<td>cell2_3</td>
<td>cell3_3</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td>
</tr>
<tr>
<td>cell1_4</td>
<td>cell2_4</td>
<td>cell3_4</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_5</td>
<td>cell2_5</td>
<td>cell3_5</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_6</td>
<td>cell2_6</td>
<td>cell3_6</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_7</td>
<td>cell2_7</td>
<td>cell3_7</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_8</td>
<td>cell2_8</td>
<td>cell3_8</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_9</td>
<td>cell2_9</td>
<td>cell3_9</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
<tr>
<td>cell1_10</td>
<td>cell2_10</td>
<td>cell3_10</td>
<td><span class="glyphicon glyphicon-option-vertical"></span></td></tr>
</tbody>
</tr>
</table>

</div>
</div>

@endsection