<?php
//vista de los productos y su cantidad
if ( session_id() == '' || !isset( $_SESSION ) ) {
    session_start();
}

if ( !isset( $_SESSION[ 'correoElectronico' ] ) ) {
    header( 'location:index.php' );
}

if ( $_SESSION[ 'tipo' ] != 'admin' ) {
    header( 'location:index.php' );
}

include 'config.php';
?>

<!doctype html>
<html class = 'no-js' lang = 'en'>

<head>
<meta charset = 'utf-8' />
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0' />
<title>Ra tienda objetos veterinarios</title>
<link rel = 'stylesheet' href = 'css/foundation.css' />
<link rel = 'stylesheet' href = 'css/tarjetas.css'>
<script src = 'js/vendor/modernizr.js'></script>
</head>

<body>

<?php include( 'plantilla.php' );
?>

<div class = 'row' style = 'margin-top:10px;'>

<?php
$result = $mysqli->query( 'SELECT * from productos order by id asc' );
if ( $result ) {
    while ( $obj = $result->fetch_object() ) {
        echo '<div class="tarjeta">';
        echo '<p><h3>' . $obj->nombre_producto . '</h3></p>';
        echo '<img src="images/products/' . $obj->nombre_imagen_producto . '" style="width: 200px; height: 150px;"/>';
        echo '<p><strong>Codigo de producto</strong>: ' . $obj->codigo_producto . '</p>';
        echo '<p><strong>Descripción</strong>: ' . $obj->descripcion_producto . '</p>';
        echo '<p><strong>Unidades disponibles</strong>: ' . $obj->cantidad . '</p>';

        echo '<div class="large-6 columns" style="padding-left:0;">';
        echo '<form method="post" name="update-quantity" action="admin-update.php">';
        echo '<p><strong>Nueva cantidad</strong>:</p>';
        echo '</div>';
        echo '<div class="large-6 columns">';
        echo '<input type="number" name="quantity[]"/>';

        echo '</div>';
        echo '</div>';
    }
}
?>

</div>

<div class = 'row' style = 'margin-top:0px;'>
<div class = 'small-12'>
<center>
<p><input style = 'clear:both;' type = 'submit' class = 'button' value = 'Actualizar'></p>
</center>
</form>
<?php include( 'plantilla-footer.php' );
?>

</div>
</div>

<script src = 'js/vendor/jquery.js'></script>
<script src = 'js/foundation.min.js'></script>
<script>
$( document ).foundation();
</script>
</body>
<br><br><br>
</html>