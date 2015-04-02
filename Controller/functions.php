<?php 



if(isset($_POST['action'])){
	$action = $_POST['action'];

	switch ($action) {
		case 'login':
			login();
			break;
		case 'logout':
			logout();
			break;

		default:
			# code...
			break;
	}

}

//**********************
//Función para iniciar sesión de usuario.
//@Return void.
//**********************
function login(){
	include '../Model/consultas.php'; 
	include 'Usuario.php';
	session_start();

	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$result = consultaUsuario($_POST['email'], $conexion);

		if($result!=''){
			if($result[6]!='' && $_POST['password']!=''){
				if($result[6]==$_POST['password']){
					$_SESSION['user']="Miguel";
					$current_user = new Usuario($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11]);
					$_SESSION['info']=$current_user;
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "-1";
		}
	}else{
		echo "-2";
	}
}


//**********************
//Función para cerrar sesión de usuario.
//@Return void.
//**********************
function logout(){
	session_start();
	session_destroy();
	echo "0";
}



//**********************
//Función para retornar el nombre de la página actual.
//@Return void.
//**********************
function get_title(){
	$url = $_SERVER['PHP_SELF'];
	$title = explode('/', $url);
	return $title[sizeof($title)-1];
}


//**********************
//Función para retornar el JS de la página actual.
//@Return void.
//**********************
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

	if($s4!=''){
	  echo '<script type="text/javascript">
	  login();
	  </script>';
	}

	if(isset($_SESSION)){
	  echo '<script type="text/javascript">
	  logout();
	  </script>';
	}

}


 ?>