<?php
// formulario de registro de usuarios
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["username"])) {
  header("location:index.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro en la Veterinaria</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
  <style>
    .error-message {
      color: red;
    }
  </style>
</head>

<body>

  <?php include('plantilla.php'); ?>


  <form method="POST" action="insert.php" style="margin-top:30px;">
    <div class="row">
      <div class="small-8">

        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Nombre</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Ingrese su nombre" name="fname" required pattern=".{3,}" title="Mínimo 3 caracteres">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Apellido</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Ingrese su apellido" name="lname" required pattern=".{3,}" title="Mínimo 3 caracteres">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Dirección</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Ingrese su dirección" name="address" required>
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Ciudad</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Ingrese su ciudad" name="city" required>
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Código Postal</label>
          </div>
          <div class="small-8 columns">
            <input type="number" id="right-label" placeholder="Ingrese su código postal" name="pin" required>
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Correo</label>
          </div>
          <div class="small-8 columns">
            <span id="email-error" class="error-message">* No contiene '@'</span>
            <input type="email" id="email-input" placeholder="Ingrese su correo electrónico" name="email" required>

          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Contraseña</label>
          </div>
          <div class="small-8 columns">
            <input type="password" id="right-label" name="pwd" required pattern=".{8,}" title="Mínimo 8 caracteres">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">

          </div>
          <div class="small-8 columns">
            <input type="submit" id="right-label" value="Registrar"
              style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            <input type="reset" id="right-label" value="Borrar"
              style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="row" style="margin-top:10px;">
    <div class="small-12">

      <?php include('plantilla-footer.php'); ?>

    </div>
  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();

    // Agrega eventos de escucha a todos los campos relevantes
    var fields = document.querySelectorAll('input[required]');
    fields.forEach(function(field) {
      field.addEventListener('input', function() {
        checkEmailField();
      });
    });

    // Agrega un evento de escucha al campo de correo electrónico
    document.getElementById('email-input').addEventListener('input', function() {
      checkEmailField();
    });

    function checkEmailField() {
      var emailInput = document.getElementById('email-input').value;
      var emailError = document.getElementById('email-error');
      if (emailInput.includes('@')) {
        // Si el correo electrónico contiene '@', oculta el mensaje de error
        emailError.style.display = 'none';
      } else {
        // Si no contiene '@', muestra el mensaje de error
        emailError.style.display = 'inline';
      }
    }
  </script>
</body>

</html>
