<title>Horario</title>
<?php 
include 'header.php';

if(!isset($_SESSION['user'])){
	echo '<script language="javascript">setTimeout("location.href=\"register.php\"", 10); </script>';
}

include '../Model/consultas.php';

if(isset($_GET['v'])){
	$horarios=horariosPrograma($_GET['v'], $conexion);
}else{
	$horarios=consultaHorarios($conexion);	
}
$horarios = json_decode($horarios);
?>
<div class="[ container-js ]">
	<h3>Horario de Grupos</h3>
	<table>
		<tbody>
			<tr>
				<td>
					<span><b>SEDE: </b></span>
					<select name="sede" id="sede">
						<option value="0"> </option>
						<option value="1">ESCOM</option>
						<option value="2">UPIICSA</option>
					</select>
				</td>
				<td>
					<span><b>PROGRAMA: </b></span>
					<select name="programa" id="programa">
						<option value="0"> </option>
						<?php if(isset($_GET['v'])){ ?>
								<option value="1" <?php echo "selected"; ?>>Sharing Languages</option>
							<?php } else{ ?>
								<option value="1">Sharing Languages</option>
								<option value="2">My Language Budy</option>
							<?php }?>
					</select>
				</td>
				<td>
					<span><b>IDIOMA: </b></span>
					<select name="idioma" id="idioma">
						<option value="0"> </option>
						<option value="1">Inglés</option>
						<option value="2">Francés</option>
						<option value="3">Alemán</option>
					</select>
				</td>
				<td>
					<span><b>MODALIDAD: </b></span>
					<select name="modalidad" id="modalidad">
						<option value="0">  </option>
						<option value="1">Semanal</option>
						<option value="2">Sabatino</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="[ horarios ][ cell ] table table-striped">
		<tbody>
			<tr>
				<td> SEDE </td>
				<td> PROGRAMA </td>
				<td> IDIOMA </td>
				<td> HORARIO </td>
				<td> DÍAS </td>
				<td> DISPONIBILIDAD </td>
				<td>  </td>
			</tr>
<?php 
	for ($i=0; $i < sizeof($horarios); $i++) { 
		$sede = json_decode((nombreSede($horarios[$i]->sede, $conexion)));
		echo '<tr id="'.$horarios[$i]->inicio.'/'.$horarios[$i]->modalidad.'" class="[ '.$sede[0]->nombre.' ][ '.$horarios[$i]->programa.' ][ '.$horarios[$i]->idioma.' ][ '.$horarios[$i]->modalidad.' ]">
				<td class="[ cell ]">'.$sede[0]->nombre.'</td>
				<td class="[ cell ]">'.$horarios[$i]->programa.'</td>
				<td class="[ cell ]">'.$horarios[$i]->idioma.'</td>
				<td class="[ cell ][ hr ]">'.$horarios[$i]->inicio.' - '.$horarios[$i]->fin.'</td>
				<td class="[ cell ]">'.$horarios[$i]->modalidad.'</td>
				<td class="[ cell ]">'.$horarios[$i]->disponibilidad.'</td>
				<td class="[ cell ]"> <img src="images/mas.png" id="" class="Add" onclick="sumar(this)" /> </td>
			</tr>';
	}
 ?>		</tbody>
 	</table>
	
	<p><h3>Tu Horario</h3></p>
	<table class="[ misHorarios ][ cell ] table table-striped">
		<tr>
			<td> SEDE </td>
			<td> PROGRAMA </td>
			<td> IDIOMA </td>
			<td> HORARIO </td>
			<td> DÍAS </td>
			<td> DISPONIBILIDAD </td>
			<td>  </td>
		</tr>
	</table>
	<p>
		<br>
		<a href="#"><input type="button" value="Inscribirse" class="[ btn btn-primary ][ button ][ js-inscribir ]" /></a>
	</p>
</div>
<?php include 'footer.php'; ?>