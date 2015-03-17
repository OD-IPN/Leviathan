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

 ?>