<?php

// valida los elementos que se ingresan al carrito 
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

include 'config.php';

try {
  $product_id = $_GET['id'];
  $action = $_GET['action'];

  if ($action === 'empty') {
    unset($_SESSION['cart']);
  }

  $result = $mysqli->query("SELECT cantidad FROM productos WHERE id =" . $product_id);

  if ($result) {
    if ($obj = $result->fetch_object()) {
      switch ($action) {
        case "add":
          if ($_SESSION['cart'][$product_id] + 1 <= $obj->cantidad) {
            $_SESSION['cart'][$product_id]++;
          }
          break;

        case "remove":
          $_SESSION['cart'][$product_id]--;
          if ($_SESSION['cart'][$product_id] == 0) {
            unset($_SESSION['cart'][$product_id]);
          }
          break;
      }
    } else {
      throw new Exception("Error fetching product information");
    }
  } else {
    throw new Exception("Error executing query");
  }
} catch (Exception $e) {
  // Redirige a cart.php en caso de excepción
  header("location:cart.php");
  exit;
}

// Redirige a cart.php después de realizar las operaciones
header("location:cart.php");
?>
