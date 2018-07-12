<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link href="app/estilos/principal.css" rel="stylesheet" type="text/css">
    <title>Eqson: Venta de equipos de sonido</title>
  </head>
  <body>
  <!-- Barra de navegación dinámica. -->
  <?
    include 'vistas/cabeceraPagina.html';
  ?>
      <div class="derecha">
          <ul>
              <!-- Muestra usuario -->
              <?php if (isset($_SESSION['username'])): ?>
                  <!-- Link a almacen -->
                  <?php if (isset($_SESSION['admin']) and $_SESSION['admin'] == 1): ?>
                      <li><a href="vistas/almacen.html">Almacén</a></li>
                      <!-- Link a productos -->
                  <?php else: ?>
                      <li><a href="vistas/misProductos.html">Mis productos</a></li>
                  <?php endif; ?>
                  <li><a href="controladores/logout.php" onclick="return confirm('Desea terminar la sesión?');"><?= $_SESSION['username'] ?></a></li>
              <?php else: ?>
                  <li><a href="vistas/login.html">Iniciar Sesión</a></li>
              <?php endif; ?>
          </ul>
      </div>
  </nav>
  <!-- Fin de barra de navegación -->

  <main></main>

  <?
    include 'vistas/piePagina.html';
  ?>
    <script src="app/scripts/jquery.js"></script>
    <script src="app/scripts/principal.js"></script>
  </body>
</html>
