<title>Register</title>
<?php include 'header.php'; ?>
    <article id="content">
      <div class="wrapper">
        <div class="wrapper">
          <section class="cols">
            <form id="ContactForm" action="#" method="post">
            <!--<form id="registerForm" action="#" method="post">-->
              <div>
                <div  class="wrapper"> <span>Nobre*:</span>
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
                <div  class="wrapper"> <span>E-mail*:</span>
                  <input type="text" class="input" >
                </div>
                  <input type="submit" value="Send" /> | <input type="submit" value="Clear" />
                </div>
            </form>    
          </section>
        </div>
      </div>
    </article>
<?php include 'footer.php'; ?>