<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si hay una sesión de usuario
    if (!isset($_SESSION['user_id'])) {
        // Si no hay una sesión de usuario, redirigir al inicio de sesión
        header("Location: login.php");
        exit();
    }

    // Obtener la información del producto desde el formulario
    $product_id = $_POST['wishlist'];

    // Validar que se ha seleccionado al menos un producto
    if (!empty($product_id)) {
        // Agregar los productos a la lista de deseos del usuario
        // Aquí puedes realizar la lógica para almacenar los productos en la base de datos o donde sea necesario.
        // Puedes usar $product_id para obtener los identificadores de los productos seleccionados.

        // Ejemplo: Guardar en la sesión para propósitos de demostración
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }

        $_SESSION['wishlist'] = array_merge($_SESSION['wishlist'], $product_id);

        // Redirigir de nuevo a la página de productos
        header("Location: productos.php");
        exit();
    } else {
        // Si no se seleccionó ningún producto, redirigir a la página de productos
        header("Location: productos.php");
        exit();
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de productos
    header("Location: productos.php");
    exit();
}
?>
