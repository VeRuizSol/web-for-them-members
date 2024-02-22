<?php
//inserta datos del usuario
include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if ($mysqli->query("INSERT INTO usuarios (nombre, apellido, direccion, ciudad, codigo_postal, correo_electronico, contrasena) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')")) {
	echo 'Data inserted';
	echo '<br/>';
}

header("location:login.php");

?>