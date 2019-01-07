<nav id="navbar" class="">
  <div class="nav-wrapper">
    <!-- Navbar Logo -->
    <div class="logo">
      <!-- Logo Placeholder for Inlustration -->
      <img src="{{ asset('images/logo.png') }}", id="logo"> 
      <!-- <p id="fiercecom-text">Fiercecom Inc.</p> -->
      <a href="#notification"><img src="{{asset('images/bellicon.png')}}", id="img-icon"></a>
    </div>

    <!-- Navbar Links -->
   
    <ul id="menu"> 
      <li><a href="javascript:unhide('toon1');">Apply</a></li>
     <li><a href="#services">Services</a></li>
     <li><a href="#about">About</a></li>
     <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

   
<!-- Menu Icon -->
<div class="menuIcon">
  <span class="icon icon-bars"></span>
  <span class="icon icon-bars overlay"></span>
</div>

<div class="overlay-menu">
  <ul id="menu">
      <li><a href="javascript:unhide('toon1');">Apply</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
</div>