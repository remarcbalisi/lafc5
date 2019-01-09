@extends('layouts.app')

@section('content')

<style>

  #myDIV .wrapper > .container{
    display: none;
  }


  /* table */
  .wrapper > .list{
    margin-top: -15%;
  }
  /* table end */

</style>

<div class="wrapper">
  <div class="list">
    <div class="list__header">
      <h5>2019 list</h5>
      <h1>User List</h1>
    </div>
    <div class="list__body">
      <table class="list__table">
      	
        @foreach( $users as $user )
        <tr class="list__row" data-image="https://www.formula1.com/content/fom-website/en/drivers/lewis-hamilton/_jcr_content/image.img.1920.medium.jpg/1533294345447.jpg" data-nationality="British" data-dob="1985-01-07" data-country="gb">
          <td class="list__cell"><span class="list__value">1</span></td>
          <td class="list__cell"><span class="list__value">{{$user->fname . ' ' . $user->lname}}</span><small class="list__label">Driver</small></td>
          <td class="list__cell"><span class="list__value">Mercedes</span><small class="list__label">Constructor</small></td>
          <td class="list__cell"><span class="list__value">95</span><small class="list__label">Points</small></td>
        </tr>
        @endforeach
        
      </table>
    </div>
  </div>
</div>
<div class="overlay" ></div>

<div class="sidebar" id="myform">
  <div class="sidebar__header">
    <div class="sidebar__title">Driver information</div>
    <button class="button button--close">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="15" y1="9" x2="9" y2="15"></line>
        <line x1="9" y1="9" x2="15" y2="15"></line>
      </svg>
    </button>
    
  </div>
  <div class="sidebar__body"></div>
  </div>




@endsection
