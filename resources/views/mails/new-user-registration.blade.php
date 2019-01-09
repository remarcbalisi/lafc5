@extends('layouts.app')

@section('content')
<div id="toon1" class="hidden">
    <header>
    <h1><i class="fa fa-cloud" style="color: blue"></i> New User Registration <i class="fa fa-cloud"></i></h1>
    <p>Floated labels allow us to design cleaner forms, in addition to adding some nice interaction!</p>
    </header>



<h2 class="heading">{{$new_user->fname . ' ' . $new_user->lname}}</h2>
    
</div>
@endsection
