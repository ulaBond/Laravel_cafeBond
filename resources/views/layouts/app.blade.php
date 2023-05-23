<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CafeBond</title>		
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}'>
	<!-- Font Awesome -->
	<link rel="stylesheet" href='{{ asset("components/font-awesome/css/font-awesome.min.css") }}'>    
	<!-- Theme style -->
	<link rel="stylesheet" href='{{ asset("dist/css/AdminLTE.min.css") }}'>
	<link rel="stylesheet" href='{{ asset("dist/css/skins/_all-skins.min.css") }}'>  	
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- Custom style -->
	<link rel="stylesheet" href='{{ asset("dist/css/custom_style.css") }}'>	
</head>
<body class="bg-light text-dark sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/dashboard') }}" class="logo"><!--  !!!!!!!!!!!!!!!!-->
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>B</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Cafe<b>Bond</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src='{{ asset("images/profile.jpg")}}' class="user-image" alt="User Image">
           <span class="hidden-xs">{{Auth::user()->name}}</span> <!-- authentification -->
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src='{{ asset("images/profile.jpg")}}' class="img-circle" alt="User Image">
              <p>{{Auth::user()->name}}</p> <!-- authentification -->
            </li>
            <li class="user-footer">
              <!-- <div class="pull-left"> -->
                <!-- <a href="{{url('/profile'.Auth::user()->id)}}" class="btn btn-default btn-flat" id="admin_profile">Update</a>authentification -->
              <!-- </div> -->
              <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>		
	
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src='{{ asset("images/profile.jpg")}}' class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p> <!-- authentification -->
        
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard" style="font-size:24px;color:red"></i> <span>Dashboard</span></a></li>
      <li><a href="/.."><i class="fa fa-dashboard" style="font-size:24px;color:green"></i> <span>На главную страницу</span></a></li>
      <li><a href="{{ url('/orderlist') }}"><i class="fa fa-dashboard" style="font-size:24px;color:green"></i> <span>Посмотреть мои заказы</span></a></li>
@if(Gate::allows('isAdmin') || Gate::allows('isManager')) 
      <li class="header">MANAGE</li>      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode" style="font-size:24px;color:green"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/categorylist') }}"><i class="fa fa-circle-o" style="font-size:24px;color:red"></i> Categories</a></li>
          <li><a href="{{ url('/productlist') }}"><i class="fa fa-circle-o" style="font-size:24px;color:red"></i> Product list</a></li>
          <!-- <li><a href="{{ url('/commentlist') }}"><i class="fa fa-circle-o"></i> Comments list</a></li> -->
          <li><a href="{{ url('../') }}"><i class="fa fa-circle-o" style="font-size:24px;color:green"></i> Come back to Main site </a></li>
        </ul>
      </li>
@endif
@if(Gate::allows('isAdmin'))
      <li class="header">USERS</li>
	    <li><a href="{{ url('/users') }}"><i class="fa fa-users" style="font-size:24px;color:green"></i> <span>Users</span></a></li>		
@endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>	
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>     
    </section>
    <!-- Main content -->
    <section class="content">           
      <div class="row">
       <!------------------CONTENT--------------------->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
			  
             @yield('content')
  
          </div>
        </div>
      </div>

      </section>
      <!-- end right col -->
    </div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <strong>IVKHK | Jõhvi | 2023 | JKTV21 | CafeBond</strong>
    </div>    
</footer>
</div>
<!-- ./wrapper -->
	
	
<!-- jQuery 3 -->
<script src='{{ asset("components/jquery/dist/jquery.min.js") }}'></script>
<!-- jQuery UI 1.11.4 -->
<script src='{{ asset("components/jquery-ui/jquery-ui.min.js") }}'></script>
<!-- Bootstrap 3.3.7 -->
<script src='{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}'></script>
<!-- AdminLTE App -->
<script src='{{ asset("dist/js/adminlte.min.js") }}'></script>
</body>
</html>	