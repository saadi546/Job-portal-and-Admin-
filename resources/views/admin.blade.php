<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.png">

<title>
  
   Administrator
  
</title>



<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
<link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->



<link id="pagestyle" href="{{asset('css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />





<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


  </head>


  <body class="g-sidenav-show  bg-gray-100">
    

    

    
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{route('admin')}}" target="_blank">
      {{-- <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
      <span class="ms-1 font-weight-bold text-white">Administrator</span>
    </a>
  </div>


  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      

    <li class="nav-item">
  <a class="nav-link text-white " href="{{route('home')}}">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">home</i>
      </div>
    
    <span class="nav-link-text ms-1">Home</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link text-white " href="{{route('jobs.post')}}">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">mail</i>
      </div>
    
    <span class="nav-link-text ms-1">Post a Job</span>
  </a>
</li>
  
<li class="nav-item">
  <a class="nav-link text-white " href="{{route('jobs.admin.listing')}}">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">receipt_long</i>
      </div>
    
    <span class="nav-link-text ms-1">Jobs Listing</span>
  </a>
</li>

 
<li class="nav-item">
  <a class="nav-link text-white " href="{{route('admin.application')}}">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">receipt_long</i>
      </div>
    
    <span class="nav-link-text ms-1">Aplicatins Forms</span>
  </a>
</li>

</ul>
  </div>
  </div>
  
</aside>

      <main class="main-content border-radius-lg ">
        <!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        
        <h3 class="font-weight-bolder mb-0">Dashbord</h3>
      </nav>
      
      <!-- Right-aligned content -->
      <div class="d-flex align-items-center">
        <div class="dropdown">
          <!-- Username button -->
          <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="username" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::check())

            {{auth()->user()->name}}
                
            @endif
          </button>
          <!-- Dropdown menu with logout button -->
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="/logout" method="POST">
                @csrf
                <button class="btn" >Logout</button>
              </form></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  

      
    <!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}" ></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" ></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}" ></script>
<script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}" ></script>
 </body>

</html>
