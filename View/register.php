<title>Register</title>
<?php include 'header.php'; ?>
    <article id="content">
      <div class="wrapper">
        <section class="col1">
            <h2 class="under">Registro</h2>
            <form id="js-RegisterForm" action="#" method="post" class="[ js-RegisterForm ][ j-register-user ]">
              <!--<form id="registerForm" action="#" method="post">-->
              <div class="form-style">
                <div  class="[ wrapper ]"> <span>Nombre*:</span><br/>
                  <input type="text" class="[ register_input ][ required ]" name="nombre"/>
                </div>
                <div  class="[ wrapper ]"> <span>Edad*:</span><br/>
                  <input type="text" class="[ register_input ][ required ]" name="edad" />
                </div>
                <div  class="[ wrapper ]" > <span>Dirección:</span><br/>
                  <input type="text" class="[ register_input ][ required ]" name="direccion"  />
                </div>
                <div  class="[ wrapper ]"> <span>Teléfono*:</span><br/>
                  <input type="text" class="[ register_input ][ required ]"  name="tel"  />
                </div>
                <div  class="[ wrapper ]" > <span>Escuela/Universidad*:</span>
                  <select class= "[ register_input ][ required ]" name="escuela">
                    <option value="IPN">IPN</option>
                    <option value="0">Otro</option>
                  </select>
                </div>
                <div  class="[ wrapper ] "  > <span>Otro:</span><br/>
                  <input type="text" class="[ register_input ][ required ]" name="externo" />
                </div>
                <div  class="[ wrapper ] "  > <span>Campus:</span><br/>
                  <input type="text" class="[ register_input ][ required ]" name="campus" />
                </div>
                <div  class="[ wrapper ]"  > <span>Email*:</span><br/>
                  <input type="text" class="[ register_input ][ required email ]" name="email" />
                </div><br/>
                  <input type="submit" value="Send" class="js-registrar" /> | <input type="submit" value="Clear" class="js-limpiar" />
                </div>
                <br/>
            </form>
        </section>
        <section class="col2 pad_left1">

          <h3 class="register_c">¿Ya estás registrado?</h3>
          <h2 class="under [ register_c ]">Inicia Sesión</h2>
          <div id="iniciar">
          <form action="../Controller/login.php" method="post" class="[ login_form ]">
            <div  class="[ wrapper ] [ register_c ]"> <span>Email</span>
              <br/>
              <input type="text" class="[ login_input ][ required email ]" name="email">
            </div>
            <div  class="[ wrapper ] [ register_c ]"> <span>Contraseña</span>
              <br/>
              <input type="text" class="[ login_input ][ required ]" name="password">
              <br/>
              <br/>
            </div>
            <div  class="[ wrapper ] [ register_c ]"> 
              <input type="submit" value="Ingresar" class="[ register_c ][ login_submit ]">
            </div>
            
          </form>
        </section>
      </div>
    </article>
<?php include 'footer.php'; ?>