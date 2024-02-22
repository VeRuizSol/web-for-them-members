<?php
// vista de productos
if ( session_id() == '' || !isset( $_SESSION ) ) {
    session_start();
}
include 'config.php';
?>

<!doctype html>
<html class = 'no-js' lang = 'en'>

<head>
<meta charset = 'utf-8' />
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0' />
<title>Productos de la Tienda de Mascotas</title>
<link rel = 'stylesheet' href = 'css/foundation.css' />
<link rel = 'stylesheet' href = 'css/tarjetas.css'>
<script src = 'js/vendor/modernizr.js'></script>
</head>
<style>
#search-container {
    position: relative;
    padding: 10px;
    width: 80%;
    box-sizing: border-box;
}

#search {
    width: calc( 100% - 60px );
    /* Ajuste para dar espacio a la lupa y al botón */
    padding: 8px 35px 8px 20px;
    /* Ajuste en el padding-left para dejar espacio para la lupa */
    font-size: 16px;
    border: 2px solid #808080;
    border-radius: 5px;
}

.search-icon,
.eye-icon {
    position: absolute;
    top: 40%;
    transform: translateY( -50% );
    width: 25px;
    height: 25px;
}

.search-icon {
    left: 10px;
    /* Ajuste para posicionar la lupa más a la izquierda */
}

#search-btn {
    background-color: #fff;
    padding: 8px 15px;
    border: 2px solid #808080;
    color: #000000;
    font-size: 16px;
    border-radius: 0 5px 5px 0;
    position: absolute;
    top: 40%;
    right: 0;
    transform: translateY( -50% );
}
</style>

<body>
<?php include( 'plantilla.php' );
?>
<div class = 'row' style = 'margin-top:10px;'>

<!-- Barra de búsqueda -->
<div id = 'search-container' class = 'position-relative'>
<form method = 'POST' action = ''>
<input type = 'search' id = 'search' name = 'search' class = 'form-control form-control-lg ps-5'
placeholder = '  Buscar productos...'
value = "<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
<!-- Ícono de lupa aquí -->
<svg xmlns = 'http://www.w3.org/2000/svg' class = 'search-icon' viewBox = '0 0 20 20' fill = 'currentColor'>
<path fill-rule = 'evenodd'
d = 'M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z'
clip-rule = 'evenodd' />
</svg>
<button id = 'search-btn' type = 'submit'>Buscar</button>
</form>
</div>

<div class = 'row' style = 'margin-top:10px;'>

<?php
$i = 0;

// Agregar filtro por búsqueda
$searchTerm = isset( $_POST[ 'search' ] ) ? $_POST[ 'search' ] : '';
$query = "SELECT * FROM productos WHERE nombre_producto LIKE '%$searchTerm%'";
$result = $mysqli->query( $query );

if ( $result === FALSE ) {
    die( mysql_error() );
}

if ( $result ) {
    while ( $obj = $result->fetch_object() ) {
        echo '<div class="tarjeta">';
        echo '<p><h3>' . $obj->nombre_producto . '</h3></p>';
        echo '<img src="images/products/' . $obj->nombre_imagen_producto . '" style="width: 200px; height: 150px;"/>';
        echo '<p><strong>Codigo de producto</strong>: ' . $obj->codigo_producto . '</p>';
        echo '<p><strong>Descripción</strong>: ' . $obj->descripcion_producto . '</p>';
        echo '<p><strong>Unidades disponibles</strong>: ' . $obj->cantidad . '</p>';
        echo '<p><strong>Precio (por Unidad)</strong>: ' . $currency . $obj->precio . '</p>';

        if ( isset( $_SESSION[ 'tipo' ] ) && $_SESSION[ 'tipo' ] == 'admin' ) {
            echo '<form action="eliminar_producto.php" method="POST">';
            echo '<input type="hidden" name="id_producto" value="' . $obj->id . '">';
            echo '<input type="submit" value="Eliminar producto">';
            echo '</form>';

        } else {
            if ( $obj->cantidad > 0 ) {
                echo '<p><a href="update-cart.php?action=add&id=' . $obj->id . '"><input type="submit" value="Añadir al carrito" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
            } else {
                echo 'Out Of Stock!';
            }

            // Mostrar checkbox solo si el usuario está logeado
            if ( isset( $_SESSION[ 'correoElectronico' ] ) ) {
                echo '<form action="agregarALista.php" method="POST">';
                echo '<input type="checkbox" name="wishlist[]" value="' . $obj->id . '"> Agregar a la lista de deseos';
                echo '<br>';
                echo '</form>';
            }
        }

        echo '</div>';
        $i++;
    }
}

// Verificar si el usuario es un administrador
if ( isset( $_SESSION[ 'tipo' ] ) && $_SESSION[ 'tipo' ] === 'admin' ) {
    // Mostrar enlace para la actualización de stock
    echo '<p><a href="admin.php">Actualizar Stock</a></p>';
}

echo '</div>';
echo '</div>';
?>

</div>';
        ?>
        <br>
        <br>
        <div class="row" style="margin-top:10px;">
            <div class="small-12">
                <?php include('plantilla-footer.php');
                ?>
            </div>
            <script src='js/vendor/jquery.js'></script>
            <script src='js/foundation.min.js'></script>
<script>
$( document ).foundation();
</script>
</body>

</html>