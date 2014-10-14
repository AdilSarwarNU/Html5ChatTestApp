<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    
    <link rel="icon" href="<?php echo base_url(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/touchTouch.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/kwicks-slider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/home.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-select.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/style1.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/HomePage.css">
      <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css">
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/superfish.js"></script>
<!--    <script src="<?php echo base_url(); ?>/assets/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.kwicks-1.5.1.js"></script>-->
     

    <script src="<?php echo base_url(); ?>/assets/js/jquery.easing.1.3.js"></script>

    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/touchTouch.jquery.js"></script>
       

    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/tms-0.4.1.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/cufon-yui.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/cufon-replace.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Kozuka_L_300.font.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Kozuka_B_700.font.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/jquery-2.0.3.js"></script>
          <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
                <script src="<?php echo base_url(); ?>/assets/js/bootstrap-select.js"></script>
</head>
<body>

<header>
  <div class="container clearfix">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar_">
          <div class="container">
              <span  > <a href="<?php echo base_url(); ?>"> <img class="logo_container" src ="<?php echo base_url(); ?>/assets/img/logo.jpg" width="100" height="100"/></a><img class="logo_container_heading" src ="<?php echo base_url(); ?>/assets/img/header.png" width="580" height="250"/></span>            
                <div style="margin-top:17px;" class="nav-collapse nav-collapse_  collapse">
                <ul  class="nav sf-menu">
                    <li ><a   id="home_menuoptn" href="<?php echo base_url(); ?>">Home</a></li>
                    <li ><a   id="abt_menuoptn" href="<?php echo base_url(); ?>home/about">About</a></li>
                    <li ><a id="contact_menuoptn"  href="<?php echo base_url(); ?>home/contact" >Contact</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
<script>
$(document)
   .ready(function () {
        if ( "<?php echo $page_title; ?>" == "Al-Rehman Cattle & Breeder")
        
           {
               document.getElementById('home_menuoptn').style.background="#e85356";
              
           }
        else  if ( "<?php echo $page_title; ?>" == "About Al-Rehman")

        {
            document.getElementById('abt_menuoptn').style.background="#e85356";
              
        }
        else  if ( "<?php echo $page_title; ?>" == "Contact Us")
        {
           document.getElementById('contact_menuoptn').style.background="#e85356";
              
        }
        
        
});
</script>

