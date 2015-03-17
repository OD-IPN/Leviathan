<?php 
include 'functions.php';
//echo $_SERVER['REQUEST_URI'];
$title = get_title();
$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = ''; 

switch ($title) {
  case 'index.php':
    echo $title;
    $s1='class="active"';
    break;
  case 'products.php':
    echo $title;
    $s2='class="active"';
    break;
  case 'locations.php':
    echo $title;
    $s3='class="active"';
    break;
  case 'register.php':
    echo $title;
    $s4='class="active"';
    break;
  case 'contact.php':
    echo $title;
    $s5='class="active"';
    break;
  case 'login.php':
    echo $title;
    $s6='class="active"';
    break;
  
  default:
    # code...
    break;
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg{behavior:url("js/PIE.htc");}</style>
<![endif]-->
</head>
<body id="page4">
<div class="body1">
  <div class="body2">
    <div class="body5">
      <div class="main">
        <!-- header -->
        <header>
          <div class="wrapper">
            <h1><a href="index.php" id="logo">Progress Business Company</a></h1>
            <nav>
              <ul id="menu">
                <li id="nav1"'.$s1.' ><a href="index.php">Home<span>Welcome!</span></a></li>
                <li id="nav4"'.$s2.' ><a href="products.php">Products<span>The best</span></a></li>
                <li id="nav2"'.$s3.' ><a href="locations.php">Locations<span>for you</span></a></li>
                <li id="nav3"'.$s4.' ><a href="register.php">Register<span>join us</span></a></li>
                <li id="nav5"'.$s5.' ><a href="contacts.php">Contacts<span>Our Address</span></a></li>
                <li id="nav6"'.$s6.' ><a href="login.php">Login<span>Register</span></a></li>
              </ul>
            </nav>
          </div>
        </header>
        <!-- header end-->
      </div>
    </div>
  </div>
</div>
<div class="body3">
  <div class="main">
    <!-- content -->
';
 ?>