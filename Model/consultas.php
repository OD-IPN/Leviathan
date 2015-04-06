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

//Información de una sede en especifico.
function consultaInfoSede($sede, $conexion){

	$consul="SELECT * FROM `sede` WHERE `id` = ".$sede.";";
	//echo $consul;
	$sedeInfo = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_row($sedeInfo); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			return json_encode($result);
		}
}


//Información de un proyecto en especifico.
function consultaInfoProyecto($proyecto, $conexion){

	$consul="SELECT * FROM `proyecto` WHERE `id` = ".$proyecto.";";
	//echo $consul;
	$sedeInfo = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_row($sedeInfo); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			return json_encode($result);
		}
}

//Consulta de Programas by Sede
function consultaProgramasSede($sede, $conexion){

	$consul="SELECT DISTINCT `programa` FROM `cursos` WHERE `sede` = ".$sede.";";
	$res = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			//var_dump($result);
			//include 'cerrar_conexion.php';
			return json_encode($result);
		}
}

//Consulta de Sedes by Programa
function consultaSedesPrograma($programa, $conexion){

	$consul="SELECT DISTINCT `sede` FROM `cursos` WHERE `id_programa` = '".$programa."';";
	$res = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			//var_dump($result);
			//include 'cerrar_conexion.php';
			return json_encode($result);
		}
}

//Consulta nombre de sede.
function nombreSede($sede, $conexion){

	$consul="SELECT DISTINCT `nombre` FROM `sede` WHERE `id` = '".$sede."';";
	$res = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			//var_dump($result);
			//include 'cerrar_conexion.php';
			return json_encode($result);
		}
}

//Consulta nombre de progrma.
function nombrePrograma($id_proyecto, $conexion){

	$consul="SELECT DISTINCT `nombre`, `imagen` FROM `proyecto` WHERE `id` = '".$id_proyecto."';";
	$res = mysql_query($consul, $conexion) or die("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	if($result==null){
		echo "Elemento no encontrado<br/>";
		include 'cerrar_conexion.php';
		}
	else
		{
			//var_dump($result);
			//include 'cerrar_conexion.php';
			return json_encode($result);
		}
}


function registrarUsuario($usuario, $conexion){
	if ($usuario['escuela']=='IPN') {
		$campus=$usuario['campus'];
	}else{
		$campus=$usuario['externo'];
	}

	$query="INSERT INTO  `usuario` (  `id` ,  `comite` ,  `nombre` ,  `apellido` ,  `edad` ,  `email` ,  `password` ,  `direccion` ,  `escuela` ,  `campus` , `telefono` ,  `rol` ) 
			VALUES ( NULL ,  '1',  '".$usuario['nombre']." ',  '".$usuario['apellido']."',  '".$usuario['edad']."',  '".$usuario['email']."',  '".$usuario['password']."',  '".$usuario['direccion']."',  '".$usuario['escuela']."',  '".$campus."',  '".$usuario['tel']."',  '0')";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	var_dump($res);
	//var_dump($usuario);
}
	
//registrar inscripción
function registrarInscripcion($inscripcion, $conexion){
	//var_dump($inscripcion);
	$query="INSERT INTO `inscripcion` (`id`, `id_usuario`, `id_curso`, `programa`, `idioma`) VALUES (NULL, '".$inscripcion['id']."', '".$inscripcion['id_curso']."', '".$inscripcion['programa']."', '".$inscripcion['idioma']."');";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	//var_dump($query);
		$query="SELECT `registrados` FROM `cursos` WHERE `id` = '".$inscripcion['id_curso']."';";
		$res2 = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
		var_dump($res2);
	if($res){

		$inscritos = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
		echo $inscritos;
		//var_dump($inscritos);
		//$query = "UPDATE `cursos` SET `disponibilidad`=['".$inscripcion['cupo']."'],`registrados`=['".$inscripcion['inscritos']."'] WHERE `id_programa` = '".$inscripcion['id_curso']."';";
	}
	//var_dump($usuario);
}


//Consultar TODAS las sedes.
function consultaSedes($conexion){
	$query= "SELECT * FROM `sede`;";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//Consultar TODoS lOs programas.
function consultaProyectos($conexion){
	$query= "SELECT `id`, `nombre`, `descripcion`, `imagen` FROM `proyecto`;";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//Consultar TODOS los horarios.
function consultaHorarios($conexion){
	$query= "SELECT * FROM `cursos`;";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//Consultar los horarios de acuerdo al programa.
function consultaHorariosPrograma($programa, $sede, $conexion){
	$query= "SELECT * FROM `cursos` WHERE `id_programa` = '".$programa."' and `sede` = '".$sede."';";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//Consultar los horarios de acuerdo al programa.
function horariosPrograma($programa, $conexion){
	$query= "SELECT * FROM `cursos` WHERE `id_programa` = '".$programa."';";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//Consultar los horarios de acuerdo a la sede.
function consultaHorariosSede($programa, $sede, $conexion){
	$query= "SELECT * FROM `cursos` WHERE `id_programa` = '".$programa."' and `sede` = '".$sede."';";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	$result =  mysql_fetch_all($res); 
	return json_encode($result);
}

//SELECT * FROM `cursos` WHERE `id_programa` = '1' and `sede` = '1';
function mysql_fetch_all($result) {
   while($row=mysql_fetch_array($result)) {
       $return[] = $row;
   }
   return $return;
}
?>