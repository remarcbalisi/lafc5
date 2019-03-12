@extends('agent.layouts.app')

@section('content')

<div class="logo">
<img src="/images/logo.png">
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


    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! Agent
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
