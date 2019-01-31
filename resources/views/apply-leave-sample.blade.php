@extends('layouts.apply-leave-sample')

@section('content')

<style>
  
h2{
  border:1px solid #4caf50;
  background-color:#4caf50;
  margin-top:0;
  height:10%;
  
  
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
  letter-spacing:5px; 

}

</style>

<div class="logo">
<img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

  <form class="form">
      <h2></h2>

      <div class="grid-container">
          <div class="grid-item">
            <label>Start Date</label>
              <input class="date" type="date" name="dateofbirth" id="dateofbirth">
          </div>

          <div class="grid-item">
            <label>End Date</label>
              <input class="date" type="date" name="dateofbirth" id="dateofbirth">
          </div>  
      </div>

      <div class="form-group">
      <label>Type of Leave</label>
      <select class="form-control input-lg">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
      </div>

      <div class="form-group">
        <label>Leave Address</label>
        <input type="text" class="form-control input-lg">
      </div>

      <div class="form-group">
      <label>Contact number</label>
        <input type="number" class="form-control input-lg">
      </div>
      <button type="submit" >Submit</button>
  </form>


</div>
</div>


@endsection