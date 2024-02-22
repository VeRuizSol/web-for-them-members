<?php
session_start();

if (!isset($_SESSION["correoElectronico"]) || $_SESSION["tipo"] !== "admin") {
    header("Location: login.php");
    exit();
}

include 'config.php';

$query = "SELECT * FROM pedidos";
$result = $mysqli->query($query);

if ($result === FALSE) {
    die(mysql_error());
}

if (isset($_POST['generarInforme'])) {

    $totalGanancias = 0;

    $comprasPorCliente = array();

    while ($row = $result->fetch_assoc()) {
        $totalGanancias += $row['total'];

        $cliente = $row['correo_electronico'];
        if (!isset($comprasPorCliente[$cliente])) {
            $comprasPorCliente[$cliente] = 0;
        }
        $comprasPorCliente[$cliente] += $row['total'];
    }

    $informeContenido = "Informe de Ganancias y Clientes\n\n";
    $informeContenido .= "Ganancias Totales: $" . number_format($totalGanancias, 2) . "\n\n";

    $informeContenido .= "Clientes que más compran:\n";
    foreach ($comprasPorCliente as $cliente => $totalCompra) {
        $informeContenido .= "Cliente: $cliente - Total Compra: $" . number_format($totalCompra, 2) . "\n";
    }

    $archivoInforme = 'informe_ventas.txt';
    file_put_contents($archivoInforme, $informeContenido);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $archivoInforme . '"');
    readfile($archivoInforme);


    unlink($archivoInforme);

    exit;
}

if (isset($_POST['generarInformeInventario'])) {
    $queryProducts = "SELECT * FROM productos";
    $resultProducts = $mysqli->query($queryProducts);

    if ($resultProducts === FALSE) {
        die(mysql_error());
    }

    $inventoryContent = "Inventario de Productos\n\n";
    while ($rowProduct = $resultProducts->fetch_assoc()) {
        $inventoryContent .= "ID: {$rowProduct['id']}\n";
        $inventoryContent .= "Código: {$rowProduct['codigo_producto']}\n";
        $inventoryContent .= "Nombre: {$rowProduct['nombre_producto']}\n";
        $inventoryContent .= "Descripción: {$rowProduct['descripcion_producto']}\n";
        $inventoryContent .= "Cantidad: {$rowProduct['cantidad']}\n";
        $inventoryContent .= "Precio: $" . number_format($rowProduct['precio'], 2) . "\n\n";
    }

    $archivoInformeInventario = 'informe_inventario.txt';
    file_put_contents($archivoInformeInventario, $inventoryContent);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $archivoInformeInventario . '"');
    readfile($archivoInformeInventario);

    unlink($archivoInformeInventario);

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/tarjetas.css">
    <script src="js/vendor/modernizr.js"></script>
</head>
<style>
    form {
        display: inline-block;
        margin-right: 10px; 
    }

    button {
        display: inline-block;
        margin-bottom: 10px;
    }
</style>

<body>

    <?php include('plantilla.php'); ?>

    <div class="row" style="margin-top:10px;">
        <div class="small-12">

            <h2>Lista de Pedidos</h2>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Código de Producto</th>
                    <th>Nombre de Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Email</th>
                </tr>




                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_pedido']}</td>";
                    echo "<td>{$row['codigo_de_producto']}</td>";
                    echo "<td>{$row['nombre_de_producto']}</td>";
                    echo "<td>{$row['descripcion_de_producto']}</td>";
                    echo "<td>{$row['precio']}</td>";
                    echo "<td>{$row['unidades']}</td>";
                    echo "<td>{$row['total']}</td>";
                    echo "<td>{$row['fecha']}</td>";
                    echo "<td>{$row['correo_electronico']}</td>";
                    echo "</tr>";
                }
                ?>

            </table>

            <form method="post" action="">
                <button type="submit" name="generarInforme">Generar Informe</button>
            </form>

            <form method="post" action="">
                <button type="submit" name="generarInformeInventario">Generar Informe Inventario</button>
            </form>

        </div>
    </div>
    <br><br><br><br>

    <?php include('plantilla-footer.php'); ?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>