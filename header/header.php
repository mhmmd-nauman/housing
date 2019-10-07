<?php session_start(); 

require_once "base_url.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <!-- <link rel="icon" href="<?=$base_url?>assets/img/logo.png" type="image/x-icon"/>
    <title>Housing</title>
    <link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
    <script src="<?=$base_url?>assets/js/jquery.min.js"></script>
    <script src="<?=$base_url?>assets/js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?=$base_url?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=$base_url?>assets/css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-light-green.css">
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  </head> -->


  <head>
    <link rel="icon" href="<?=$base_url?>assets/img/logo.png" type="image/x-icon"/>
    <title>Housing</title>
    <link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
    <script src="<?=$base_url?>assets/js/jquery.min.js"></script>
    <script src="<?=$base_url?>assets/js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?=$base_url?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=$base_url?>assets/css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="<?=$base_url?>assets/css/w3-theme-light-green.css">
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  </head>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
  <body>
   
   <!-- Top menu on small screens -->
        <!-- Header -->
        <header class="w3-container w3-center w3-padding-48 w3-white">
          
          <img src="<?=$base_url?>assets/img/logo.png" alt="Housing" width="10%"> <h1 class="w3-xxxlarge"><b>Online Housing Society Office Management System</b></h1>
          <h6><span class="w3-tag w3-wide">Plots Sell & Buy</span></h6>
          <div class="w3-bar w3-border">
            <a href="<?=$base_url?>index.php" class="w3-bar-item w3-button">Home</a>
            <?php
            
                  if(isset($_SESSION['uid'])){
                    $d=$_SESSION['uid'];
                    echo '
                    <a href="'.$base_url.signout.'.'.php.'" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> signout</a>

                   
                    ';
                    if($d["type"]=="member")
                          {
                            echo '<a href="'.$base_url.member_panel.'/'.property_detail.'.'.php.'" class="w3-bar-item w3-button"><img src="'.$base_url.assets.'/'.ads.'/'.user.'.'.png.'"class="rounded-circle" alt="Cinque Terre" width="30px" height="30px"> Profile</a>';
                              echo '<a href="'.$base_url.member_panel.'/'.index.'.'.php.'" class="w3-bar-item w3-button w3-green"><i class="fa fa-plus"></i> Add Property</a>';

                          }
                          elseif($d["type"]=="admin")
                          {
                            echo '<a href="'.$base_url.admin_panel.'/'.index.'.'.php.'" class="w3-bar-item w3-button"><img src="'.$base_url.assets.'/'.ads.'/'.admin.'.'.png.'" class="rounded-circle" alt="Cinque Terre" width="30px" height="30px"> Profile</a>';
                            echo '<a href="'.$base_url.admin_panel.'/'.addproperty.'.'.php.'" class="w3-bar-item w3-button w3-green"><i class="fa fa-plus"></i> Add Property</a>';
                          }
                           else
                          {
                            echo '<a href="'.$base_url.society_office_user_panel.'/'.index.'.'.php.'" class="w3-bar-item w3-button"><img src="'.$base_url.assets.'/'.ads.'/'.admin.'.'.png.'" class="rounded-circle" alt="Cinque Terre" width="30px" height="30px"> Profile</a>';
                             echo '<a href="'.$base_url.society_office_user_panel.'/'.addproperty.'.'.php.'" class="w3-bar-item w3-button w3-green"><i class="fa fa-plus"></i> Add Property</a>';
                          }
                  }else{
                    echo '
                    <a href="'.$base_url.'login.php" class="w3-bar-item w3-button w3-light-grey">Login</a>
            <a href="'.$base_url.'register.php" class="w3-bar-item w3-button">Register</a>
                    ';
                  }
              ?>
            
            
          </div>
        </header>