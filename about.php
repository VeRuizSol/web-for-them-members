<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>For Them Member's - Clínica Veterinaria</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>
  <?php include('plantilla.php'); ?>
  <div class="row" style="margin-top:30px;">
    <div class="small-12">
      <h2>Nuestra Historia</h2>
      <p>Desde nuestros inicios en el 2023, nos dedicamos a brindar atención veterinaria de calidad. Lo que comenzó como
        una
        pasión por el bienestar de las mascotas, se ha convertido en "For Them Member's", una clínica líder en el
        cuidado
        de tus amigos peludos.</p>

      <h2>Nuestra Misión</h2>

      <p>En For Them Member's, nuestra misión es proporcionar cuidado y productos de calidad para mascotas. Queremos
        mejorar la vida de los animales y promover la tenencia responsable. Nos esforzamos por hacer que la compra de
        productos y servicios veterinarios sea fácil, segura y satisfactoria para todos.</p>

      <h2>Nuestra Visión</h2>
      <p>
        Visualizamos un mundo donde todas las mascotas reciben el amor y cuidado que merecen. Queremos ser líderes en la
        promoción de la salud y el bienestar animal, fomentando la conexión especial entre las mascotas y sus dueños. A
        medida que crecemos, continuaremos innovando y mejorando nuestros servicios para brindar experiencias
        excepcionales y contribuir al bienestar de las mascotas en todo el mundo.

        En For Them Member's, no solo estamos en el negocio veterinario; estamos en el negocio de fortalecer los lazos
        entre humanos y animales, y de hacer que cada vida animal cuente.

        ¡Acompáñanos en esta emocionante travesía!
      </p>
      <?php
      if ($_SESSION['tipo'] == "admin") {
        echo '<li><a>Bienvenido Admin!</a></li>';
        echo '<li><a>Tipo de Usuario: ' . $_SESSION['tipo'] . '</a></li>';
      } else {
        echo '<li><a>Bienvenido Usuario!</a></li>';
      }
      ?>



      <?php include('plantilla-footer.php'); ?>


    </div>
  </div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>