<title>Products</title>
<?php 
include 'header.php'; 
include '../Model/consultas.php';
?>
  <article id="content">
  <div class="wrapper">
  <?php 
    $proyectos = consultaProyectos($conexion);
    $proyectos = json_decode($proyectos);
    for ($j=0; $j < sizeof($proyectos); $j++) {  ?>
      <section class="cols">
        <div class="wrapper pad_bot<?php echo "$j+1"; ?>">
          <h3><span class="dropcap"><?php echo $proyectos[$j]->id; ?></span><?php echo $proyectos[$j]->nombre ?></h3>
          <figure><img src="<?php echo $proyectos[$j]->imagen; ?>" alt="" class="proy_img"></figure>
          
          <p class="pad_bot1"><?php echo $proyectos[$j]->descripcion ?> <br><br>
          <a href="infoProyecto.php?v=<?php echo $j+1; ?>" class="link1">Read More</a> 
          </p>          
          
        </div>
      </section>
      <?php } ?>        
   </div>
  </article>
<?php include 'footer.php'; ?>