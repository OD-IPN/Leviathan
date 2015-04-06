<?php 
include '../Controller/functions.php';
include '../Controller/Usuario.php';

session_start();

$title = get_title();
$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = $s7 = ''; 

if(isset($_SESSION['user'])){
  $logged = true;
}else{
  $logged = false;
}

switch ($title) {
  case 'index.php':
    //echo $title;
    $s1='class="active"';
    break;
  case 'products.php':
    //echo $title;
    $s2='class="active"';
    break;
  case 'locations.php':
    //echo $title;
    $s3='class="active"';
    break;
  case 'register.php':
    //echo $title;
    $s4='class="active"';
    break;
  case 'contact.php':
    //echo $title;
    $s5='class="active"';
    break;
  case 'login.php':
    //echo $title;
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
<link rel="stylesheet" href="recursos/lib-sweetalert-master/sweet-alert.css" type="text/css" media="all">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="recursos/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="all">

<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="js/jcarousellite.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/Zurols.js"></script>
<script type="text/javascript" src="recursos/lib-sweetalert-master/sweet-alert.min.js"></script>
<script type="text/javascript" src="recursos/bootstrap/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg{behavior:url("js/PIE.htc");}</style>
<![endif]-->
</head>';
if($title=='index.php'){
  echo '<body id="pageIndex">';    
}else{
  echo '<body id="page4">';  
}


echo '<div class="body1">
  <div class="body2">
    <div class="body5">
      <div class="main">
        <!-- header -->';
        if($title!='index.php'){
          echo '<header class="header">';    
        }else{
          echo '<header>';  
        }

          echo '<div class="wrapper">
            <h1><a href="index.php" id="logo">Leviathan - Internal Operations</a></h1>
            <nav>
              <ul id="menu">';
                if(1){
                  echo '<li id="nav1"'.$s1.' ><a href="index.php">Home<span>Inicio</span></a></li>';
                }
                if(1){
                  echo '<li id="nav4"'.$s2.' ><a href="products.php">Products<span>Productos</span></a></li>';
                }
                if(1){
                  echo '<li id="nav2"'.$s3.' ><a href="locations.php">Locations<span>Sedes</span></a></li>';
                }
                if(!$logged){
                  echo '<li id="nav3"'.$s4.' ><a href="register.php">Login/Register<span>Registro/Iniciar Sesión</span></a></li>';
                }
                if(1){
                  echo '<li id="nav5"'.$s5.' ><a href="contact.php">Contacts<span>Contacto</span></a></li>';
                }
                if($logged){
                  echo '<li id="nav6"'.$s6.' ><a href="horario.php">Schedule<span>Horario</span></a></li>';
                }
                if($logged && whoAmI()=='1'){
                  echo '<li id="nav7"'.$s7.' ><a href="reportes.php?v=1">Reportes<span>SL</span></a></li>';
                }
                if($logged && whoAmI()=='2'){
                  echo '<li id="nav7"'.$s7.' ><a href="reportes.php?v=2">Reportes<span>MLB</span></a></li>';
                }
                if($logged){
                  echo '<li id="nav6"><a href="#" class="js-logout">Logout<span>Cerrar Sesión</span></a></li>';
                }
            echo '</ul>
            </nav>
          </div>';
if($title=='index.php'){
  echo '        <div class="[ slider_css ]">  <div class="wrapper">
            <div class="slider">
              <ul class="items">
                <li><img src="images/img1.jpg" alt=""></li>
                <li><img src="images/img2.jpg" alt=""></li>
                <li><img src="images/img3.jpg" alt=""></li>
                <li><img src="images/img4.jpg" alt=""></li>
              </ul>
            </div>
          </div>
        </div>';
}
echo '        </header>
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