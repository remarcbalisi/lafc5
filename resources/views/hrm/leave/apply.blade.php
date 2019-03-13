@extends('hrm.layouts.app')

@section('content')

  
<div class="logo">
<img src="/images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('success_msg'))
        <div class="alert alert-success" role="alert">
            {{ session('success_msg') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form class="form" action="{{route('hrm-leave-apply-store')}}" method="POST">
                {{ csrf_field() }}
      <h1></h1>
    <div class="form-group" >
      <label>Leave Type</label>
      <select class="form-control input-lg" name="leave_type" id="leave_type"> 
      @foreach($leave_types as $leave_type)
        <option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
        @endforeach
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
        <input type="text" name="leave_address" value="{{$user->concatAddress()[0]}}" class="form-control input-lg" id="leave_address" placeholder="Address">
      </div>

      <div class="form-group">
      <label for="{{$contact->slug}}-contact">{{$contact->contact_type->name}} Contact </label>
        <input type="number" class="form-control input-lg" name="contact" value="{{$contact->country_code . ' ' . $contact->number}}"  id="{{$contact->slug}}-contact" placeholder="{{$contact->slug}} Contact">
      </div>

      <div class="form-group">
        <label for="comment">Note:</label>
        <textarea class="form-control" name="note" id="note"></textarea>
    </div>
      <button type="submit" id="btn" class="btn btn-success">Apply</button>
  </form>



<!-- 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Apply Leave</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success_msg') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('hrm-leave-apply-store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="leave_type">Leave Type</label>
                                <select class="form-control" name="leave_type" id="leave_type">
                                    @foreach($leave_types as $leave_type)
                                        <option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="leave_address">Address</label>
                                <input type="text" name="leave_address" value="{{$user->concatAddress()[0]}}" class="form-control" id="leave_address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="{{$contact->slug}}-contact">{{$contact->contact_type->name}} Contact</label>
                                <input type="text" name="contact" value="{{$contact->country_code . ' ' . $contact->number}}" class="form-control" id="{{$contact->slug}}-contact" placeholder="{{$contact->slug}} Contact" >
                            </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Apply</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
