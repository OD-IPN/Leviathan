<?php 
include 'conexion.php';

function consultaUsuario($email, $conexion){

	$consul="SELECT * FROM `usuario` WHERE  `email` =  '".$email."';";
	$res = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_row($res); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			//var_dump($result);
			include 'cerrar_conexion.php';
			return $result;
		}
}



?>