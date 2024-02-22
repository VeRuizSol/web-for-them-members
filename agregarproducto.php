<?php
//vista de los productos y su cantidad
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['correoElectronico'])) {
    header('location:index.php');
}

if ($_SESSION['tipo'] != 'admin') {
    header('location:index.php');
}

include 'config.php';


?>

<!doctype html>
<html class='no-js' lang='en'>

<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Agregar Productos</title>
    <link rel='stylesheet' href='css/foundation.css' />
    <link rel='stylesheet' href='css/tarjetas.css'>
    <style>
        
        /* Estilos para centrar el formulario */
        .container {
            display: grid;

            height: 80vh;
            /* Esto hace que el contenedor ocupe el 80% de la altura de la pantalla */
            width: 80%;
            /* Esto hace que el contenedor ocupe el 80% del ancho de la pantalla */
            margin: 0 auto;
            /* Esto centra el contenedor horizontalmente */
            height: 100vh;
            /* Esto hace que el contenedor ocupe toda la altura de la pantalla */
        }
    </style>

    <script src='js/vendor/modernizr.js'></script>
</head>

<body>

    <?php include('plantilla.php');
    ?>
    <div class="container">
        <h1>Agregar Producto</h1>
        <form action="agregarproductobd.php" method="POST">
            <div class="mb-3">
                <label for="codigo_producto" class="form-label">Código Producto</label>
                <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" required>
            </div>
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre Producto</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_producto" class="form-label">Descripción Producto</label>
                <textarea class="form-control" id="descripcion_producto" name="descripcion_producto"
                    required></textarea>
            </div>
            <div class="mb-3">
                <label for="nombre_imagen_producto" class="form-label">Nombre Imagen Producto</label>
                <input type="text" class="form-control" id="nombre_imagen_producto" name="nombre_imagen_producto"
                    required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
                <div id="precio-error" class="text-danger"></div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class='row' style='margin-top:10px;'>

        <?php include('plantilla-footer.php');
        ?>

    </div>
    </div>

    <script src='js/vendor/jquery.js'></script>
    <script src='js/foundation.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var precioInput = document.getElementById('precio');
            var precioError = document.getElementById('precio-error');

            precioInput.addEventListener('input', function () {
                var precio = parseInt(precioInput.value);

                if (isNaN(precio) || precio <= 0) {
                    precioError.textContent = 'El precio debe ser un número mayor que 0.';
                    precioInput.classList.add('is-invalid');
                } else {
                    precioError.textContent = '';
                    precioInput.classList.remove('is-invalid');
                }
            });
        });
    </script>
    <script>
        $(document).foundation();
    </script>
</body>
<br><br><br>

</html>