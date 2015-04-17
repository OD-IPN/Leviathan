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

		case 'register':
			register();
			break;

		case 'registrar_grupo_SL':
			inscribir_SL();
			break;

		case 'registrar_grupo_MLB':
			inscribir_MLB();
			break;

		case 'reportes':
			reportes();
			break;

		default:
			# code...
			break;
	}
}

//**********************
//Función para saber el tipo de sesión de usuario.
//@Return void.
//**********************
function whoAmI(){
	return $_SESSION['info']->get_roll();
}

//**********************
//Función para saber el tipo de sesión de usuario.
//@Return void.
//**********************
function reportes(){
	include '../Model/consultas.php'; 
	switch ($_POST['tipo']) {
		case '0':
			reporteGeneralGrupos($_POST['programa'], $conexion);
			break;
		
		default:
			# code...
			break;
	}
}


//**********************
//Función para consultar la información de todos los grupos activos.
//@Return void.

//**********************

//
function reporteGeneralGrupos($programa, $conexion){
	$info = array();
	
	$sedes = json_decode(consultaSedesPrograma($programa, $conexion));
	
	for ($z=0; $z < sizeof($sedes) ; $z++) { 
		$sedeA = json_decode(nombreSede($z+1, $conexion));
		$nombreSede = $sedeA[0]->nombre;
		$info[$z][0]=$sedeA[0]->nombre;
		//var_dump($info);
		$grupos = json_decode(consultaHorariosPrograma($programa, $sedes[$z]->sede, $conexion));
		for ($y=0; $y < sizeof($grupos) ; $y++) { 
			//var_dump($grupos[$y]);
			$info[$z][1+$y]=$grupos[$y];
		}
	}
	
	//var_dump($info);
	for ($x=0; $x < sizeof($info) ; $x++) { 
		?> 
		<h2><?php echo $info[$x][0]; ?></h2>
		<table class="[ horarios ][ cell ][ table table-striped ]">
			<tbody>
				<tr>
					<td> PROGRAMA </td>
					<td> CÓDIGO </td>
					<td> IDIOMA </td>
					<td> HORARIO </td>
					<td> DÍAS </td>
					<td> DISPONIBILIDAD </td>
				</tr> 
				<?php 
					for ($w=1; $w < sizeof($info[$x]) ; $w++) { ?>

						<tr>
							<td><?php echo $info[$x][$w]->programa; ?></td>
							<td><?php echo $info[$x][$w]->programa.' - '.$info[$x][$w]->id; ?></td>
							<td><?php echo $info[$x][$w]->idioma; ?></td>
							<td><?php echo $info[$x][$w]->inicio.' - '.$info[$x][$w]->fin; ?></td>
							<td><?php echo $info[$x][$w]->modalidad; ?></td>
							<td><?php echo $info[$x][$w]->disponibilidad; ?></td>
						</tr>
				<?php
					}
				 ?>
				<tr>
					
				</tr>
		</table>
	<?php
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
					$_SESSION['user']=$result[7].' '.$result[8];
					$current_user = new Usuario($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11]);
					$_SESSION['info']=$current_user;
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "2";
		}
	}else{
		echo "3";
	}
}


//**********************
//Función para registro de usuarios.
//@Return void.
//**********************

function register(){
	include '../Model/consultas.php'; 
	include 'Usuario.php';

	registrarUsuario($_POST, $conexion);
}

//**********************
//Función para registro de clases de un usuario.
//@Return void.
//**********************

function inscribir_SL(){
	include '../Model/consultas.php'; 
	include 'Usuario.php';
	//consultarCupo($conexion);
	registrarInscripcion($_POST, $conexion);
}


//**********************
//Función para registro de clases de un usuario.
//@Return void.
//**********************

function inscribir_MLB(){
	include '../Model/consultas.php'; 
	include 'Usuario.php';
	//consultarCupo($conexion);
	registrarInscripcionMLB($_POST, $conexion);
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
	$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = $s7 = $s8 = ''; 

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
	  case 'horario.php':
	    echo $title;
	    $s6='class="active"';
	    break;
	  case 'reportes.php':
	    echo $title;
	    $s7='class="active"';
	    break;
	  case 'horarioMLB.php':
	    echo $title;
	    $s8='class="active"';
	    break;
	  
	  default:
	    # code...
	    break;
	}

	if($s4!=''){
	  echo '<script type="text/javascript">
	  login();
	  registrar();
	  </script>';
	}

	if($s6!=''){
	  echo '<script type="text/javascript">	
	  filtrar();
	  registrarGrupos();
	  </script>';
	}
	if($s7!=''){
	  echo '<script type="text/javascript">	  
		reportes();
	  </script>';
	}
	if($s8!=''){
	  echo '<script type="text/javascript">	  
		horariosMLB();
		inscribirMLB();
	  </script>';
	}

	if(isset($_SESSION)){
	  echo '<script type="text/javascript">
	  logout();
	  </script>';
	}
}?>