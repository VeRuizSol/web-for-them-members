<?php
include 'config.php';

// Verifica que se haya enviado un formulario por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $codigo_producto = $_POST['codigo_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $nombre_imagen_producto = $_POST['nombre_imagen_producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    // Prepara la consulta SQL para insertar el producto
    $sql = "INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, nombre_imagen_producto, cantidad, precio) VALUES ('$codigo_producto', '$nombre_producto', '$descripcion_producto', '$nombre_imagen_producto', '$cantidad', '$precio')";

    // Ejecuta la consulta
    if ($mysqli->query($sql) === TRUE) {
        // Redirige a la página de éxito si la inserción fue exitosa
        header("Location: success.php?producto_agregado=true");
    } else {
        // Si hubo un error, muestra un mensaje de error
        echo "Error al agregar el producto: " . $mysqli->error;
    }

    // Cierra la conexión
    $mysqli->close();
}
?>
