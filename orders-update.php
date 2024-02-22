<?php
//agrega los datos a la base de datos
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

include 'config.php';

if (isset($_SESSION['cart'])) {

  $total = 0;

  foreach ($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM productos WHERE id = " . $product_id);

    if ($result) {

      if ($obj = $result->fetch_object()) {


        $costoTotal = $obj->precio * $quantity;

        $user = $_SESSION["correoElectronico"];

        $query = $mysqli->query("INSERT INTO pedidos (codigo_de_producto, nombre_de_producto, descripcion_de_producto, precio, unidades, total, correo_electronico) VALUES('$obj->codigo_producto', '$obj->nombre_producto', '$obj->descripcion_producto', $obj->precio, $quantity, $costoTotal, '$user')");

        if ($query) {
          $nuevaCantidad = $obj->cantidad - $quantity;
          if ($mysqli->query("UPDATE productos SET cantidad = " . $nuevaCantidad . " WHERE id = " . $product_id)) {

          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:success.php");

?>