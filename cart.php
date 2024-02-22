<?php
// muestra los artículos en el carrito
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
include 'config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artículos para Mascotas</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include('plantilla.php'); ?>

  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <?php

      echo '<p><h3>Tu Carrito de compras</h3></p>';

      if (isset($_SESSION['cart'])) {

        $total = 0;
        echo '<table>';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Nombre</th>';
        echo '<th>Cantidad</th>';
        echo '<th>Costo</th>';
        echo '</tr>';
        foreach ($_SESSION['cart'] as $product_id => $quantity) {

          $result = $mysqli->query("SELECT codigo_producto, nombre_producto, descripcion_producto, cantidad, precio FROM productos WHERE id = " . $product_id);

          if ($result) {

            while ($obj = $result->fetch_object()) {
              $cost = $obj->precio * $quantity;
              $total = $total + $cost;

              echo '<tr>';
              echo '<td>' . $obj->codigo_producto . '</td>';
              echo '<td>' . $obj->nombre_producto . '</td>';
              echo '<td>' . $quantity . '&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id=' . $product_id . '">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id=' . $product_id . '">-</a></td>';
              echo '<td>' . $cost . '</td>';
              echo '</tr>';
            }
          }
        }

        echo '<tr>';
        echo '<td colspan="3" align="right">Total</td>';
        echo '<td>' . $total . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Vaciar carrito</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continuar compra</a>';
        if (isset($_SESSION['correoElectronico'])) {
          echo '<a href="orders-update.php"><button style="float:right;">Pagar</button></a>';
        } else {
          echo '<a href="login.php"><button style="float:right;">Ingresar</button></a>';
        }
        echo '</td>';
        echo '</tr>';
        echo '</table>';
      } else {
        echo "No tienes artículos en tu carrito de compras";
      }

      echo '</div>';
      echo '</div>';
      ?>

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
