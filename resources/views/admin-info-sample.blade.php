@extends('layouts.admin-info-sample')

@section('content')

<div class="logo">
  <img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>


<header>
  <img class="img" src="{{ asset('images/img.jpg') }}">
  <div class="header">
    <h2 style="margin-left:6%;font-weight:bold;">Regine Laguting</h2>
     <p style="margin-left:6%">Status : <strong>Active</strong></p>
     <h4 style="margin-left:6%"> Id no:</h4>
     <h4 style="margin-left:6%"> Phone no:</h4>
    <h4 style="margin-left:6%"> Gender:</h4>
    <h4 style="margin-left:6%"> Address:</h4>
    <h4 style="margin-left:6%"> Job Title:</h4>
    <h4 style="margin-left:6%"> Department:</h4>
    <h4 style="margin-left:6%"> Email:</h4>
  </div>

</header>
<section>
  <h1></h1>
</section>
<button type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-pencil"></i></button>
<button type="button" class="btn btn-primary btn-circle btn-lg"><i class="glyphicon glyphicon-list"></i></button>
<button type="button" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-trash"></i></button>
</div>
</div>


@endsection