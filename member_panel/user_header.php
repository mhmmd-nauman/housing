<?php 
session_start();
require_once "../base_url.php";
if(isset($_SESSION['uid'])){
    $d=$_SESSION['uid'];
    ?>
    <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" href="<?=$base_url?>../assets/img/logo.png" type="image/x-icon"/>
    <title>Housing</title>
    <link rel="stylesheet" href="<?=$base_url?>../assets/css/bootstrap.min.css">
    <script src="<?=$base_url?>../assets/js/jquery.min.js"></script>
    <script src="<?=$base_url?>../assets/js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?=$base_url?>../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=$base_url?>../assets/css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="<?=$base_url?>../assets/css/w3-theme-light-green.css">
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
   <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="<?=$base_url?>../assets/ads/user.png" class="w3-circle w3-margin-right" style="width:46px">
      <b>Member</b>
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?= $d['name'];?></strong></span><br>
      
      
      <a href="<?=$base_url?>../index.php" class="w3-bar-item w3-text-red w3-button"><i class="fa fa-home"></i> Home</a>
      
      <a href="<?=$base_url?>../signout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> signout</a>
    </div>
  </div>
  <hr>
  <?php
  if($d['status']=='Active'):
  ?>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
     <!-- <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus w3-text-green fa-fw"></i>  Add Plot</a> -->

  <a href="property_detail.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-binoculars w3-text-orange fa-fw"></i> Plot Request</a>
  <a href="property_detail.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-binoculars w3-text-orange fa-fw"></i> Add Bill</a>
  <a href="all_property_detail.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home w3-text-green fa-fw"></i> Plots</a>

    <br><br>
  </div>
  <?php
  endif;
  ?>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <?php
        $d=$_SESSION['uid'];
       
        
        
   } else {
    header('location:../login.php');
   }
   
?>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>