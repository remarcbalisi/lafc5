@extends('layouts.apply-leave-sample')

@section('content')

<style>
  
h3{
  border:1px solid #4caf50;
  background-color:#4caf50;
  margin-top:0;
  height:7.5%;
  text-align:left;
  color:white;
  padding-top:13px;
  padding-left:30px;
  
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
  margin-left:37%;
  margin-top:6%;  
  margin-bottom:6%;   
  letter-spacing:5px; 

}

 .date, .form-control{
  padding:9px;
  font-size:18px;
  text-align:left;
  border-width:2px;
  border-radius:6px;
  border-style:outset;
  border-color:#0db520;
  opacity:76%;
  
}

</style>

<div class="logo">
<img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

  <form class="form">
      <h3>Apply Leave</h3>

      <div class="form-group" >
      <label>Leave Type</label>
      <select class="form-control input-lg">
        <option>Sick Leave</option>
        <option>Vacation Leave</option>
        <option>3</option>
      </select>
      </div>

      <div class="grid-container">
          <div class="grid-item">
            <label>Start Date</label>
              <input class="date" type="date">
          </div>

          <div class="grid-item">
            <label>End Date</label>
              <input class="date" type="date">
          </div>  
      </div>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control input-lg">
      </div>

      <div class="form-group">
      <label>Contact number</label>
        <input type="number" class="form-control input-lg">
      </div>

      <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>

      <button type="submit" >Apply</button>
  </form>


</div>
</div>


@endsection