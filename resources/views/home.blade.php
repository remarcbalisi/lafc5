@extends('layouts.app')

@section('content')
<div id="toon1" class="hidden">
     <header>
       <h1><i class="fa fa-cloud" style="color: blue"></i> Lorem Ipsum <i class="fa fa-cloud"></i></h1>
       <p>Floated labels allow us to design cleaner forms, in addition to adding some nice interaction!</p>
     </header>

<form action="">
  <!--  General -->
  <div class="form-group">


    <form id="form" name="form" class="form-inline">
    <div class="form-group">    
        <table>
            
            <tr>
                <td>
                <label for="startDate">Start Date</label>
                <input id="startDate" name="startDate" type="text" class="form-control" />&nbsp;
                <label for="endDate">End Date</label>
                <input id="endDate" name="endDate" type="text" class="form-control" />
                </td>
            </tr>
       </table>
    </div>
</form>

<div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel">
        <?php
        foreach($leavetypes as $leave){
        ?>
            <option value='{{$leave->id}}'>{{$leave->name}}</option>


        <?php
        }
        ?>
      </select>
      <label for="fruit">Type of Leave</label>
    </div>

    <h2 class="heading">Hours Calculation</h2>
    
    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="name">
      <label for="name">Leave Address</label>
    </div>
    <div class="controls">
      <input type="email" id="email" class="floatLabel" name="email">
      <label for="email">Contact Number</label>
    </div>

    <div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel">
        <option value="blank"></option>
        <option value="Regine">Regine</option>
        <option value="Remarc">Remarc</option>
        <option value="Julven">Julven</option>
        <option value="Fretzie">Fretzie</option>
      </select>
      <label for="fruit">Direct Approver</label>
    </div>

<div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel">
        <option value="blank"></option>
        <option value="Regine">Regine</option>
        <option value="Remarc">Remarc</option>
        <option value="Julven">Julven</option>
        <option value="Fretzie">Fretzie</option>
      </select>
      <label for="fruit">Approved By</label>
    </div>

    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="name">
      <label for="name">Position</label>
    </div>
     
    </div>
    </div>
@endsection
