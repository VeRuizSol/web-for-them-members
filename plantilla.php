<?php
// Inicia la sesión si no está iniciada
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
?>
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">For Them Member's - Tienda de Mascotas</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>
  <section class="top-bar-section">
    <ul class="right">
      <li class=""><a href="about.php">A cerca de</a></li>
      <?php
      // Verifica si la clave 'tipo' está definida en $_SESSION antes de intentar acceder a ella
      if (isset($_SESSION['tipo'])) {
          if ($_SESSION['tipo'] == "admin") {
              echo '<li><a href="products.php">Visualizar productos</a></li>';
              echo '<li><a href="agregarproducto.php">Agregar productos</a></li>';
              echo '<li><a href="admin.php">Actualizar productos</a></li>';
              echo '<li><a href="orders.php">Pedidos</a></li>';
          } else {
              echo '<li><a href="products.php">Productos</a></li>';
              echo '<li><a href="cart.php">Carrito de compras</a></li>';
              echo '<li><a href="orders.php">Revisar pedidos</a></li>';
              echo '<li><a href="contact.php">Contacto</a></li>';
          }
      } else {
          echo '<li><a href="products.php">Productos</a></li>';
          echo '<li><a href="cart.php">Carrito de compras</a></li>';
          echo '<li><a href="orders.php">Revisar pedidos</a></li>';
          echo '<li><a href="contact.php">Contacto</a></li>';
      }

      if (isset($_SESSION['correoElectronico'])) {
          echo '<li><a href="logout.php">Cerrar sesión</a></li>';
      } else {
          echo '<li><a href="login.php">Ingresar</a></li>';
          echo '<li><a href="register.php">Registrarse</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>
