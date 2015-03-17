<title>Home</title>
<?php 

include '../Model/consultas.php'; 
include 'Usuario.php';

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$result = consultaUsuario($_POST['email'], $conexion);	

	if($result){
		if(""+$result[7]==$_POST['password']){
			$current_user = new Usuario($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11]);
			$current_user->printUser();
		}
	}

}else{
	echo "Usuario Incorrecto";
}


?>

