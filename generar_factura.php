<?php
session_start();

if (!isset($_SESSION["correoElectronico"])) {
    header("location:index.php");
}

include 'config.php';

// Verificar si se hizo clic en el botón "Generar factura"
if (isset($_POST['generar_factura'])) {

    $user = $_SESSION["correoElectronico"];
    $result = $mysqli->query("SELECT * from pedidos where correo_electronico='" . $user . "'");
    
    // Crear un archivo de factura
    $file = fopen("factura.txt", "w");

    if ($file) {
        // Escribir encabezado en el archivo
        fwrite($file, "Mis pedidos\n\n");

        $totalAmount = 0; // Inicializar el monto total

        // Escribir detalles de los pedidos en el archivo
        while ($obj = $result->fetch_object()) {
            fwrite($file, "Orden ID: " . $obj->id_pedido . "\n");
            fwrite($file, "Fecha de compra: " . $obj->fecha . "\n");
            fwrite($file, "Código de producto: " . $obj->codigo_de_producto . "\n");
            fwrite($file, "Nombre del producto: " . $obj->nombre_de_producto . "\n");
            fwrite($file, "Precio por unidad: " . $obj->precio . "\n");
            fwrite($file, "Unidades compradas: " . $obj->unidades . "\n");
            fwrite($file, "Coste total: " . $currency . $obj->total . "\n");
            fwrite($file, "-----------------------------------------\n");

            // Actualizar el monto total
            $totalAmount += $obj->total;
        }

        // Escribir el monto total al final del archivo
        fwrite($file, "\nMonto total a pagar: " . $currency . $totalAmount . "\n");

        // Cerrar el archivo
        fclose($file);

        // Descargar el archivo generado
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="factura.txt"');
        readfile("factura.txt");

        // Eliminar el archivo después de descargarlo
        unlink("factura.txt");

        exit;
    }
}

// Redirigir si no se hizo clic en el botón
header("location:mis_pedidos.php");
?>
