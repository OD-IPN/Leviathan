<title>Sedes de Proyectos</title>
<?php 
include 'header.php';
include '../Model/consultas.php';

$sedes=consultaSedesPrograma($_GET['v'], $conexion);
$locations = json_decode($sedes);

$proyecto = consultaInfoProyecto($_GET['v'], $conexion);
$infoProyecto = json_decode($proyecto);
?>
<h2>INFORMACIÓN SOBRE: <br/></h2>
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo $infoProyecto[4]; ?>" class="[ product_img_sede ]"></td>
				<td><h2><?php echo $infoProyecto[1]." - ".$infoProyecto[2]; ?></h2></td>
			</tr>
			<tr><td></td></tr>
		</tbody>
	</table>
	<p class="info_css">
		<br/><b>Fecha de Inicio: </b><?php echo $infoProyecto[7]; ?>
		<br/><b>Duración: </b><?php echo $infoProyecto[6]; ?>
		<br/><b>Costo: </b><?php echo $infoProyecto[5]; ?>
	<br/>
</p>
<h2>SEDES DEL PROYECTO: <br/></h2>
<?php 
for ($i=0; $i <sizeof($locations) ; $i++) { 
	$sede = consultaInfoSede($locations[$i]->sede, $conexion);
	$sede = json_decode($sede);
?>
	<table class="sedes_proyecto">
		<tbody>
			<tr><h3 class="titulos_proyecto"><?php echo $sede[1]." - ".$sede[2]; ?></h3></tr>
			<tr>
				<td class="img-js"><img src="<?php echo $sede[4]; ?>" alt=""></td>
				<td class="img-js"><?php echo $sede[3]; ?></td>
			</tr>
		</tbody>	
	</table>
	<p> </p>
	<table class="[ horarios ][ cell ][ table table-striped ]">
		<tbody>
			<tr>
				<td> PROGRAMA </td>
				<td> IDIOMA </td>
				<td> HORARIO </td>
				<td> DÍAS </td>
				<td> DISPONIBILIDAD </td>
			</tr>
		<?php 
			$horarioSede = consultaHorariosSede($_GET['v'], $locations[$i]->sede, $conexion);
			$horarioSede = json_decode($horarioSede);

			for ($k=0; $k < sizeof($horarioSede) ; $k++) { ?>
				<tr>
					<td class="cell"><?php echo $horarioSede[$k]->programa; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->idioma; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->inicio." - ".$horarioSede[$k]->fin; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->modalidad; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->disponibilidad; ?></td>
				</tr>		
			<?php } ?>
		</tbody>
	</table>
	<p><br></p>
<?php } 

if(isset($_SESSION['user'])){
	echo '<p><a href="horario.php?v='.$_GET['v'].'"><input type="button" value="Inscribirse" class="[ btn btn-primary ][ button ]" /></a></p>';
}
else {
	echo '<p><a href="register.php"><input type="button" value="Inicia Sesión" class="[ btn btn-primary ][ button ]" /></a></p>';
}

include 'footer.php'; ?>

