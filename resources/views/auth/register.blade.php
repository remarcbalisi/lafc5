@extends('layouts.signup')

@section('content')
<div class="row">
    <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Welcome</h3>
        <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
    </div>
    <div class="col-md-9 register-right">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">Sign Up</h1>
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option class="hidden" selected disabled>Gender *</option>
                                <option>Female</option>
                                <option>Male</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control">
                                <option class="hidden" selected disabled>Team Leader *</option>
                                <option>Regine</option>
                                <option>Remarc</option>
                                <option>Julven</option>
                                <option>Fretzie</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Address *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Contact No. *" value="" />
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Employee ID *" value="" />
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option class="hidden" selected disabled>Position *</option>
                                <option>Human Resource Mngr.</option>
                                <option>HR Staff</option>
                                <option>Agent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control">
                                <option class="hidden" selected disabled>Department</option>
                                <option>IT</option>
                                <option>Unknown</option>
                                <option>Unknown</option>
                            </select>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
