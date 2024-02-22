<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto'])) {
    $id_producto = $_POST['id_producto'];

    // Prepara la consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = $id_producto";

    // Ejecuta la consulta
    if ($mysqli->query($sql) === TRUE) {
        // Redirige a la página de éxito si la eliminación fue exitosa
        header("Location: products.php");
    } else {
        // Si hubo un error, muestra un mensaje de error
        echo "Error al eliminar el producto: " . $mysqli->error;
    }

    // Cierra la conexión
    $mysqli->close();
}
?>
