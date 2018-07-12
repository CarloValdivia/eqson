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
              <?php if (isset($_SESSION['username'])): ?>
                  <li><a href="controladores/logout.php" onclick="return confirm('Desea terminar la sesión?');"><?= $_SESSION['username'] ?></a></li>
              <?php else: ?>
                  <li><a href="vistas/login.html">Iniciar Sesión</a></li>
              <?php endif; ?>
          </ul>
      </div>
  </nav>

  <main></main>

  <?
    include 'vistas/piePagina.html';
  ?>
    <script src="app/scripts/jquery.js"></script>
    <script src="app/scripts/principal.js"></script>
  </body>
</html>
