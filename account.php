<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}



if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ra tienda se objetos veterinarios</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include('plantilla.php'); ?>

  <div class="row" style="margin-top:30px;">
    <div class="small-12">
      <p>
        <?php echo '<h3>Hola ' . $_SESSION['fname'] . '</h3>'; ?>
      </p>
      <p>
      <h4>
        Detalles de la cuenta</h4>
      </p>
      <p>A continuación se encuentran sus datos en la base de datos. Si desea cambiar algo, simplemente ingrese nuevos
        datos en el cuadro de texto
        y haga clic en actualizar.</p>
    </div>
  </div>

  <form method="POST" action="update.php" style="margin-top:30px; ">
    <div class="row">
      <div class="small-12">
        <div class="row">
          <div class="small-3 columns">
            <label for="right-label" class="right inline">Nombre</label>
          </div>
          <div class="small-8 columns end">
            <?php
             $result = $mysqli->query('SELECT * FROM usuarios WHERE id=' . $_SESSION['id']);


            if ($result === FALSE) {
              die(mysql_error());
            }

            if ($result) {
              $obj = $result->fetch_object();
              echo '<input type="text" id="right-label" placeholder="' . $obj->fname . '" name="fname">';
              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Last Name</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->lname . '" name="lname">';
              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Address</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->address . '" name="address">';
              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">City</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->city . '" name="city">';
              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Pin Code</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->pin . '" name="pin">';
              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Email</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="email" id="right-label" placeholder="' . $obj->email . '" name="email">';
              echo '</div>';
              echo '</div>';
            }

            echo '<div class="row">';
            echo '<div class="small-3 columns">';
            echo '<label for="right-label" class="right inline">Password</label>';
            echo '</div>';
            echo '<div class="small-8 columns end">';
            echo '<input type="password" id="right-label" name="pwd">';
            echo '</div>';
            echo '</div>';
            ?>

            <div class="row">
              <div class="small-4 columns">

              </div>
              <div class="small-8 columns">
                <input type="submit" id="right-label" value="Enviar"
                  style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                <input type="reset" id="right-label" value="Borrar"
                  style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              </div>
            </div>
          </div>
        </div>

  </form>
  
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>