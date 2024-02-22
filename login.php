<?php
// formulario de ingreso
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
  <title>Ingresar a la Tienda de Mascotas</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include('plantilla.php'); ?>

  <form method="POST" action="verify.php" style="margin-top:30px;">
    <div class="row">
      <div class="small-8">

        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Correo</label>
          </div>
          <div class="small-8 columns">
            <input type="email" id="right-label" placeholder="tucorreo@example.com" name="correo">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Contraseña</label>
          </div>
          <div class="small-8 columns">
            <input type="password" id="right-label" name="contrasenia">
          </div>
        </div>

        <div class="row">
          <div class="small-4 columns">

          </div>
          <div class="small-8 columns">
            <input type="submit" id="right-label" value="Ingresar"
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
  </script>
</body>

</html>
