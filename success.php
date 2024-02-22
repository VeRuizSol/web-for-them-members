<?php
//vista de los productos y su cantidad
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['correoElectronico'])) {
    header('location:index.php');
}


include 'config.php';


?>

<?php
// Verifica si el producto se agregó correctamente
$producto_agregado = isset($_GET['producto_agregado']) && $_GET['producto_agregado'] === 'true';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compra Exitosa en la Veterinaria</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>

<body>

    <?php include('plantilla.php'); ?>

    <div class="row" style="margin-top:10px;">
        <div class="small-12">
            <?php if ($producto_agregado): ?>
                <h1>Felicitaciones!</h1>
                <p>Su producto ha sido agregado con exito a la lista de productos!</p>
                <!-- Puedes agregar más detalles sobre el seguimiento de la compra o información adicional según tus necesidades. -->
            <?php else: ?>
                <h1>Felicitaciones</h1>
                <p>Su compra en la veterinaria ha sido exitosa. ¡Gracias por confiar en nosotros para el cuidado de sus mascotas!.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include('plantilla-footer.php'); ?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>
