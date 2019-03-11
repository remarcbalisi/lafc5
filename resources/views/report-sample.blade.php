@extends('layouts.adminpage-sample')

@section('content')


<div class="logo">
  <img src="images/logo.png">
</div>
  <div class="black-bar"></div>
  <div class="report">  

  <div class="reportwrapper">
  <div class="reportwrapper__role">
    <p>Reports</p>
    <div class="grid-container">
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
        <!-- <div class="grid-item">
          <label>From Date</label><br>
            <input class="date" type="date">
        </div>

        <div class="grid-item">
          <label>To Date</label><br>                                       
            <input class="date" type="date">
        </div>   -->
        <button type="button" class="btn btn-primary">Filter</button>
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
            <!-- <p>Positon</p> -->
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
                <p class="designation">IT department</p>
                <p class="location">lahug</p>
              </div>
            </div>
          </td>
          <td>
            <!-- <div class="skills">
              <p status="status">100%</p>
            </div> -->
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
            <!-- <div class="extra">
              <button><span></span></button>
            </div> -->
          </td>
        </tr>
        <tr class="t-row">
          <td> 
            <div class="item">
              <div class="i">
                <p class="name">Regine Laguting</p>
                <p class="designation">IT department</p>
                <p class="location">lahug</p>
              </div>
            </div>
          </td>
          <td>
            <!-- <div class="skills">
              <p status="status">100%</p>
            </div> -->
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
            <!-- <div class="extra">
              <button><span></span></button>
            </div> -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

</div>



@endsection