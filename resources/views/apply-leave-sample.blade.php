@extends('layouts.apply-leave-sample')

@section('content')

<style>
  
h1{
  /* border:1px solid #4caf50;
  background-color:#4caf50;
  margin-top:0;
  height:15%;
  text-align:center;
  color:white;
  font-weight:bolder;
  padding-top:50px; */
  margin-bottom:10%;
 
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

 .form-control{
  padding:9px;
  font-size:18px;
  text-align:left;
  -webkit-box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69); 
  box-shadow: 1px 5px 15px 5px rgba(176,176,176,0.69);
    
}

</style>

<div class="logo">
<img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>

  <form class="form">
      <h1></h1>

      <div class="form-group" >
      <label>Leave Type</label>
      <select class="form-control input-lg">
        <option>Sick Leave</option>
        <option>Vacation Leave</option>
        <option>3</option>
      </select>
      </div>

      <div class="form-group">
        <label>Date</label>
        <input type="text" class="form-control  input-lg" name="datefilter" value="" />

          <script type="text/javascript">
          $(function() {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

          });
          </script>
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
        <label for="comment">Note:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>

      <button type="submit" >Apply</button>
  </form>


<!-- </div>
</div> -->


@endsection