<?php 

//**********************
//Función para retornar el nombre de la página actual.
//@Return void.
//**********************
function get_title(){
	$url = $_SERVER['PHP_SELF'];
	$title = explode('/', $url);
	return $title[sizeof($title)-1];
}

function footer_javascript(){
	$title=get_title();
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

}


 ?>