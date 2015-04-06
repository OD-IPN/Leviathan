<title>Sede</title>
<?php 
include 'header.php';
include '../Model/consultas.php';

$infoSede=consultaInfoSede($_GET['v'], $conexion);
$infoSede = json_decode($infoSede);
//	var_dump($infoSede);

$programasSede=consultaProgramasSede($_GET['v'], $conexion);
$programasSede = json_decode($programasSede);

?>
<h2><?php echo $infoSede[1].' - '.$infoSede[2]; ?></h2>
<table>
	<tbody>
		<tr>
			<td class="img-js"><img src="<?php echo $infoSede[4]; ?>" alt="">
			</td>
			<td class="img-js"><?php echo $infoSede[3]; ?>
			</td>
		</tr>
	</tbody>
</table>

<div class="content">
	<?php 
	for ($i=0; $i <sizeof($programasSede) ; $i++) { 
		$infoProyecto = consultaInfoProyecto($i+1, $conexion);
		$infoProyecto = json_decode($infoProyecto);?>
		<p>
			<br>
		</p>
		<h2><?php echo $infoProyecto[2]; ?></h2>
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
				$horarioSede = consultaHorariosSede($i+1 , $_GET['v'], $conexion);
				$horarioSede = json_decode($horarioSede);

				for ($k=0; $k < sizeof($horarioSede) ; $k++) { ?>
				<tr>
					<td class="cell"><img src="<?php echo $infoProyecto[4]; ?>" alt="" class="[ product_img_sede_location ]"></td>
					<td class="cell"><?php echo $horarioSede[$k]->programa; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->idioma; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->inicio." - ".$horarioSede[$k]->fin; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->modalidad; ?></td>
					<td class="cell"><?php echo $horarioSede[$k]->disponibilidad; ?></td>
				</tr>		
				<?php } ?>
			</tbody>
		</table>

		<?php	  
			if(isset($_SESSION['user'])){
				if ($infoProyecto[1] == 'SL'){
					echo '<p><a href="horario.php?v='.$_GET['v'].'"><input type="button" value="Inscribirse" class="[ btn btn-primary ][ button ]" /></a></p>';
				}else{
					echo '<p><a href="horario.php?v='.$_GET['v'].'"><input type="button" value="Personaliza tu Horario" class="[ btn btn-primary ][ button ]" /></a></p>';
				}
			}
			else {
				echo '<p><a href="register.php"><input type="button" value="Inicia Sesión" class="[ btn btn-primary ][ button ]" /></a></p>';
			}
		}
		?>
	</div>

	<?php 
	include 'footer.php'; ?>


