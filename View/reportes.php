<title>Reportes</title>
<?php 
include 'header.php';

if(!isset($_SESSION['user'])){
	echo '<script language="javascript">setTimeout("location.href=\"register.php\"", 10); </script>';
}

include '../Model/consultas.php';
$usar = $_SESSION['info'];

if(isset($_GET['v'])){
	
	//$horarios=horariosPrograma($_GET['v'], $conexion);
}else{
	//$horarios=consultaHorarios($conexion);	
}
//$horarios = json_decode($horarios);

		$infoProyecto = nombrePrograma($_GET['v'], $conexion);
		$infoProyecto = json_decode($infoProyecto);
?>
<table>
	<tbody>
		<tr>
			<td class="img-js"><img src="<?php echo $infoProyecto[0]->imagen; ?>" alt="" class="[ product_img_sede ]">
			</td>
			<td class="img-js"><h2><?php echo $infoProyecto[0]->nombre; ?></h2>
			</td>
		</tr>
		<tr><td></td></tr>
	</tbody>
</table>

<table class="[ reporte ]"> 
	<tbody>
		<tr>
			<td>Reportes: </td>
			<td>
				<select name="reportes" id="reportes">
					<option value="0">Grupos</option>
					<option value="0">Grupos</option>
					<option value="0">Grupos</option>
				</select>
			</td>
				<input type="hidden" id="programa" value="<?php echo $_GET['v']; ?>">
			<td>
				<input type="submit" value="Visualizar" class="[ button ][ btn btn-primary ][ reportes_js ]" />
			</td>
		</tr>
	</tbody>
</table>

<div class="[ reporteInfo ]">
</div>

<?php include 'footer.php'; ?>