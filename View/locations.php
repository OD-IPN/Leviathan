<title>Locations</title>
<?php 
include 'header.php'; 
include '../Model/consultas.php';
?>
  <article id="content">
  <div class="wrapper">
  <?php 
    $sedes = consultaSedes($conexion);
    $sedes = json_decode($sedes);

    for ($j=0; $j < sizeof($sedes); $j++) {  ?>
      <section class="cols">
        <div class="wrapper pad_bot<?php echo "$j+1"; ?>">
          <h3><span class="dropcap"><?php echo $sedes[$j]->id; ?></span><?php echo $sedes[$j]->nombre ?></h3>
          <figure><img src="<?php echo $sedes[$j]->imagen_url; ?>" alt="" class="sede_img"></figure>
          
          <p class="pad_bot1"><?php echo $sedes[$j]->direccion ?> <br><br>
          <a href="infoSede.php?v=<?php echo $j+1; ?>" class="link1">Read More</a> 
          </p>          
          
        </div>
      </section>
      <?php } ?>        
   </div>
  </article>
<?php include 'footer.php'; ?>