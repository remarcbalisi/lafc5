@extends('layouts.leave-request-sample')

@section('content')

<style>
 
  .accordion {
    margin-top:10%;
    margin-bottom:10%;
    margin-left:15%;
    width: 70%;
    box-shadow:  0 30px 40px 0 rgba(0,0,0,0.25);
  }
  .accordion input {
    display: none;
  }
  .box {
    position: relative;
    background: white;
      height: 64px;
      transition: all .15s ease-in-out;
  }
  .box::before {
      content: '';
      position: absolute;
      display: block;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      pointer-events: none;
      box-shadow: 0 -1px 0 #e5e5e5,0 0 2px rgba(0,0,0,.12),0 2px 4px rgba(0,0,0,.24);
  }
  header.box {
    background: #4CAF50;
    z-index: 100;
    cursor: initial;
    box-shadow: 0 -1px 0 #e5e5e5,0 0 2px -2px rgba(0,0,0,.12),0 2px 4px -4px rgba(0,0,0,.24);
  }
  header .box-title {
    margin: 0;
    font-weight: normal;
    font-size: 16pt;
    color: white;
    cursor: initial;
  }
  .box-title {
    width: calc(100% - 40px);
    height: 64px;
    line-height: 64px;
    padding: 0 20px;
    display: inline-block;
    cursor: pointer;
    -webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;
  }
  .box-content {
    width: calc(100% - 40px);
    padding: 30px 20px;
    font-size: 11pt;
    color: rgba(0,0,0,.54);
    display: none;
  }
  .box-close {
    position: absolute;
    height: 64px;
    width: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
    display: none;
  }
  input:checked + .box {
    height: auto;
    margin: 16px 0;
      box-shadow: 0 0 6px rgba(0,0,0,.16),0 6px 12px rgba(0,0,0,.32);
  }
  input:checked + .box .box-title {
    border-bottom: 1px solid rgba(0,0,0,.18);
  }
  input:checked + .box .box-content,
  input:checked + .box .box-close {
    display: inline-block;
  }
  .arrows section .box-title {
    padding-left: 44px;
    width: calc(100% - 64px);
  }
  .arrows section .box-title:before {
    position: absolute;
    display: block;
    content: '\203a';
    font-size: 18pt;
    left: 20px;
    top: -2px;
    transition: transform .15s ease-in-out;
    color: rgba(0,0,0,.54);
  }
  input:checked + section.box .box-title:before {
    transform: rotate(90deg);
  }

  /* pagination */
  .pagination {
  display: inline-block;
  float:right;
  padding-right:17%;
  padding-bottom:10%;
  margin-top:-5%;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #4CAF50;}

/* action button */
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}

</style>


<div class="logo">
  <img src="images/logo.png">
</div>
<div class="black-bar"></div>
<div class="bg"><div>
    
<nav class="accordion arrows">
		<header class="box">
			<label for="acc-close" class="box-title">Leave Request List</label>
		</header>
		<input type="radio" name="accordion" id="cb1" />
		<section class="box">
			<label class="box-title" for="cb1">Regine lala</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><p>Leave Applied<br>
        <strong>From: feb 6, 2019 - To: feb 8, 2019 </strong></p>
        <div class="container">
        <button type="button" class="btn btn-success">Approved</button>
        <button type="button" class="btn btn-danger">Denied</button>
        </div>
      </div>
		</section>
		<input type="radio" name="accordion" id="cb2" />
		<section class="box">
			<label class="box-title" for="cb2">Fretzie baba</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><p>Leave Applied<br>
        <strong>From: feb 6, 2019 - To: feb 8, 2019 </strong></p>
        <div class="container">
        <button type="button" class="btn btn-success">Approved</button>
        <button type="button" class="btn btn-danger">Denied</button>
        </div>
      </div>
		</section>
		<input type="radio" name="accordion" id="cb3" />
		<section class="box">
			<label class="box-title" for="cb3">Test test</label>
			<label class="box-close" for="acc-close"></label>
			<div class="box-content"><p>Leave Applied<br>
        <strong>From: feb 6, 2019 - To: feb 8, 2019 </strong></p>
        <div class="container">
        <button type="button" class="btn btn-success">Approved</button>
        <button type="button" class="btn btn-danger">Denied</button>
        </div>
      </div>
		</section>

		<input type="radio" name="accordion" id="acc-close" />
	</nav>

  <div class="pagination">
  <a href="#">&laquo;</a>
  <a class="active"  href="#">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>


</div>
</div>


@endsection