<?php 
date_default_timezone_set('Asia/Manila'); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Loan Monitoring System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="public/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="public/bower_components/jquery/dist/jquery.js"></script>
  <script src="public/bower_components/jquery/dist/core.js"></script>

</head>
<style>

#example2 tr{
  font-size: 12pt;
}

#example3 tr{
  font-size: 14pt;
}
.priority {
  background-color: #F0E68C;
}

#sub-menu1 > li > a {
  background-color: #191919;
  padding-right: 20px;
  padding-left: 30px;
  color: #555555;
  font-weight: bold;
  border-left: 4px solid #c72a25;
}
#sub-menu1 > li > a:hover {
  color: #ffffff ;
  background-color: #232323;
}
#sub-menu1 > li > a.active {
  color: #ffffff !important;
  background-color: #c72a25 !important;
}

li a#has-submenu1:hover{
  color: #ffffff !important;
  background-color: #191919 !important;
}
a#has-submenu1:active{
  background-color: #232323 !important;
}
a#has-submenu1:focus{
  background-color: #232323 !important;
}

table {
    font-family: Calibri;
  border-collapse: collapse;
  font-size:14px; 
    width: 100%;
  
}
tr,td,th{
    border: 1px solid black;
    padding: 6px;
  white-space:nowrap;
  height: 20px;
}

tr:nth-child(even) {
    background-color: #EEE;
}
td.fontwith {
  color:#222; 
  background-color:#FF6666;
}

aside div#image {
        display: block;
        width: 100%;
        height: 150px;
        background: rgba(0,0,0,0.5);
      }

        #imagelogo {
        height: 55px;
        width: 55px;
        background: url("public/image/user.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: absolute;
        left: 50%;
        top: 11%;
        border-radius: 50%;
        transform: translate(-50%,-50%);
      }

      #spanname {
        position: absolute;
        left: 50%;
        top: 16%;
        transform: translate(-50%,-50%);
        color: white;
        /*font-weight: bold;*/
        font-size: 10pt;
      }

</style>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="cpanel" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><b> Loan</b> Monitoring</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <li>
            <a href="settings"><i class="fa fa-gears"></i> Settings</a>
          </li>
           <li>
            <a href="logout"><i class="glyphicon glyphicon-off"></i> Logout</a>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

      <div id="image">
    <img src="public/image/background.jpg" style="max-height: 180px;width: 100%;z-index: -1;position: absolute;">
  <!--   <div id="imagelogo">
      
    </div> -->
   <!--  <span id="spanname"><?php echo $_SESSION['SESS_USER_FULL_NAME'];?></span> -->
  </div>
    <section class="sidebar">
      
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li style="color: white;padding: 10px 5px;text-align: left;">Hi <?php echo $_SESSION['SESS_USER_FULL_NAME'];?> !</li>
        <li class="header">MAIN NAVIGATION</li>

          <li>
          <a href="cpanel">
            <i class="fa fa-tv"></i> <span>HOME</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>


         <li class="treeview">
            <a href="#">
              <i class="fa fa-address-card"></i>
              <span>PROFILE</span>
              <span class="pull-right-container">
            </a> 
            <ul class="treeview-menu">
              <li><a href="newBorrower"><i class="fa fa-circle-o"></i> NEW</a></li>
              <li><a href="profile_list"><i class="fa fa-circle-o"></i> LIST</a></li>
            </ul>
        </li>


         <li>
          <a href="loan_list">
          <i class="fa fa-edit"></i><span>LOAN LIST</span>
          <span class="pull-right-container">

          </span>
        </a>
        </li>


        <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Reports</span>
              <span class="pull-right-container">
            </a> 
            <ul class="treeview-menu">
              <li><a href="report_payment"><i class="fa fa-circle-o"></i> Payment</a></li>
              <li><a href="report_pastdue"><i class="fa fa-circle-o"></i> Overdue</a></li>
            </ul>
        </li>

      </ul>
    </section>

  </aside>

  <div class="content-wrapper">


  
