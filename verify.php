<?php

// Verifica que la cuenta ingresada sea válida
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
include 'config.php';

$correo_electronico = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];
$flag = 'false'; // Por defecto, asumimos que el inicio de sesión no es exitoso

$result = $mysqli->query('SELECT * from usuarios order by id asc');

if ($result === FALSE) {
  die(mysql_error());
}

if ($result) {
  while ($obj = $result->fetch_object()) {
    if ($obj->correo_electronico === $correo_electronico && $obj->contrasena === $contrasenia) {

      $_SESSION['correoElectronico'] = $correo_electronico;
      $_SESSION['tipo'] = $obj->tipo;
      $_SESSION['id'] = $obj->id;
      $_SESSION['nombre'] = $obj->nombre;

      $flag = 'true'; // Actualiza el flag si el inicio de sesión es exitoso
      break; // No es necesario continuar el bucle una vez que se encontraron las credenciales correctas
    }
  }
}

// Devuelve un mensaje en formato JSON indicando si el inicio de sesión fue exitoso
echo json_encode(array('success' => $flag));

// Redirección después de enviar la respuesta JSON
if ($flag === 'true') {
  header("Location: index.php");
} else {
  header("Location: index.php");
  exit(); // Importante salir del script después de la redirección
}
?>
