<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["correoElectronico"])) {
  header("location:index.php");
}

if ($_SESSION["tipo"] === "admin") {
  header("location:pedidos.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mis ordenes</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include('plantilla.php'); ?>

  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <h3>Mis pedidos</h3>
      <hr>

      <?php
      $user = $_SESSION["correoElectronico"];
      $result = $mysqli->query("SELECT * from pedidos where correo_electronico='" . $user . "'");
      if ($result) {
        while ($obj = $result->fetch_object()) {

          echo '<p><h4>Orden ID ->' . $obj->id_pedido . '</h4></p>';
          echo '<p><strong>Fecha de compra</strong>: ' . $obj->fecha . '</p>';
          echo '<p><strong>Código de producto</strong>: ' . $obj->codigo_de_producto . '</p>';
          echo '<p><strong>Nombre del producto</strong>: ' . $obj->nombre_de_producto . '</p>';
          echo '<p><strong>Precio por unidad</strong>: ' . $obj->precio . '</p>';
          echo '<p><strong>Unidades compradas</strong>: ' . $obj->unidades . '</p>';
          echo '<p><strong>Coste total</strong>: ' . $currency . $obj->total . '</p>';
          echo '<p><hr></p>';

        }
      }
      ?>

      <!-- Agregar el botón "Generar factura" -->
      <form method="post" action="generar_factura.php">
        <input type="submit" name="generar_factura" value="Generar factura" class="button">
      </form>
    </div>
  </div>
      <br><br><br>
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
