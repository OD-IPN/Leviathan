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

function dia($valor){
	switch ($valor) {
		case 1:
			return 'Lunes';
			break;
		
		case 2:
			return 'Martes';
			break;
		
		case 3:
			return 'Miércoles';
			break;
		
		case 4:
			return 'Jueves';
			break;
		
		case 5:
			return 'Viernes';
			break;
		
		default:
			# code...
			break;
	}
}

//registrar inscripción de grupo MLB
function registrarInscripcionMLB($inscripcion, $conexion){
	$d1 = $d2 = $d3 = $h1 = $h2 = $h3 = $contador=0;
	for ($i=1; $i <= 5; $i++) { 
		if(isset($inscripcion['horario'][$i])){
			for ($k=0; $k < sizeof($inscripcion['horario'][$i]); $k++) { 
				switch ($contador) {
					case 0:
						$d1=dia($i);
						$h1=$inscripcion['horario'][$i][$k];
						$contador++;
						break;
					
					case 1:
						$d2=dia($i);
						$h2=$inscripcion['horario'][$i][$k];
						$contador++;
						break;
					
					case 2:
						$d3=dia($i);
						$h3=$inscripcion['horario'][$i][$k];
						$contador++;
						break;
					
					default:
						# code...
						break;
				}
			}
		}
	}

	$query="INSERT INTO `mlb_grupos` (`id`, `user_id`, `idioma`, `sede`, `dia_1`, `hr_1`, `dia_2`, `hr_2`, `dia_3`, `hr_3`, `nombre`, `registrados`, `status`) VALUES (NULL, '".$inscripcion['id']."', '".$inscripcion['idioma']."', '".$inscripcion['sede']."', '".$d1."', '".$h1."', '".$d2."', '".$h2."', '".$d3."', '".$h3."', '".$inscripcion['nombre']."', '".$inscripcion['registrados']."', '0');";
	$res = mysql_query($query, $conexion) or die ("Error: ".mysql_error());
	var_dump($res);
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