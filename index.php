

<?php
//ventana principal
if ( session_id() == '' || !isset( $_SESSION ) ) {
    session_start();
}
?>

<!DOCTYPE html>
<html class = 'no-js' lang = 'en'>

<head>
<meta charset = 'utf-8' />
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0' />
<title>Articulos veterinarios</title>
<link rel = 'stylesheet' href = 'css/foundation.css' />
<script src = 'js/vendor/modernizr.js'></script>
</head>

<body>

<?php include( 'plantilla.php' );
?>

<img data-interchange = '[images/bolt-retina.jpg, (retina)], [images/bolt-landscape.jpg, (large)], [images/bolt-mobile.jpg, (mobile)], [images/bolt-landscape.jpg, (medium)]'>
<noscript><img src = 'images/bolt-landscape.jpg'></noscript>

<!-- Contenido principal -->
<div class = 'row' style = 'margin-top:10px;'>
<div class = 'small-12'>
<h2>Bienvenido a la Tienda de Mascotas</h2>
<p>Descubre una amplia selección de productos para tus queridas mascotas.</p>
<p>Explora nuestra tienda y encuentra lo mejor para perros, gatos, aves, roedores y más.</p>
<a href = 'products.php' class = 'button'>Ver Productos</a>
</div>
</div>
<br><br><br>

<div class = 'row' style = 'margin-top:10px;'>
<div class = 'small-12'>

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

</html>
