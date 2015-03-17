<title>Contact</title>
<?php include 'header.php'; ?>
    <article id="content">
      <div class="wrapper">
        <section class="col1">
          <h2 class="under">Registro</h2>
          <form id="ContactForm" action="#" method="post">
            <!--<form id="registerForm" action="#" method="post">-->
            <div>
              <div  class="wrapper"> <span>Nombre*:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Edad*:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Dirección:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Teléfono*:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Escuela/Universidad*:</span>
                <select name="" id="" class="input">
                  <option value="IPN">IPN</option>
                  <option value="0">Otro</option>
                </select>
              </div>
              <div  class="wrapper"> <span>Otro:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Campus:</span>
                <input type="text" class="input" >
              </div>
              <div  class="wrapper"> <span>Email*:</span>
                <input type="text" class="input" >
              </div>
                <input type="submit" value="Send" /> | <input type="submit" value="Clear" />
              </div>
          </form>
        </section>
        <section class="col2 pad_left1">

          <h3 class="register_c">¿Ya estás registrado?</h3>
          <h2 class="under [ register_c ]">Inicia Sesión</h2>
          <div id="iniciar">
          <form action="#" method="post">
            <div  class="[ wrapper ] [ register_c ]"> <span>Email</span>
              <br/>
              <input type="text" class="login_input">
            </div>
            <div  class="[ wrapper ] [ register_c ]"> <span>Contraseña</span>
              <br/>
              <input type="text" class="login_input">
              <br/>
            </div>
            <div  class="[ wrapper ] [ register_c ]"> 
              <input type="submit" value="Ingresar" class="[ register_c ]">
            </div>
            
          </form>
        </section>
      </div>
    </article>
<?php include 'footer.php'; ?>