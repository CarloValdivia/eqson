<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link href="app/estilos/principal.css" rel="stylesheet" type="text/css">
  <title>Eqson: Venta de equipos de sonido</title>
</head>
<body>
  <?php include 'vistas/cabeceraPagina.html'; ?>
  <!-- Barra de navegación dinámica. -->
  <nav>
    <div class="izquierda">
      <ul>
        <li>
          <a href="#">Inicio</a>
        </li>
        <li>
          <a href="#">Marcas</a>
        </li>
      </ul>
    </div>
    <div class="centro">
      <form>
        <input type="search" name="q" placeholder="Encuentra tu equipo de sonido">
        <input type="submit" value="Buscar">
      </form>
    </div>
    <div class="derecha">
      <ul>
        <!-- Muestra almacen o misProductos de acuerdo a privilegio de usuario -->
        <?php if (isset($_SESSION['usuario'])): ?>
          <!-- Link a almacén -->
          <?php if ($_SESSION['privilegio'] == 1): ?>
          <li><a href="vistas/almacen.html">Almacén</a></li>
          <li><a href="vistas/usuarios.php">Usuarios</a></li>
           <!-- Link a productos -->
          <?php else: ?>
          <li><a href="vistas/misProductos.html">Mis productos</a></li>
          <?php endif; ?>

          <!-- Item de inicio de sesión -->
          <li><a href="controladores/logout.php" onclick="return confirm('Desea terminar la sesión?');"><?php echo $_SESSION['usuario']; ?></a></li>
        <?php else: ?>
          <li><a href="vistas/login.php">Iniciar Sesión</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <!-- Fin de barra de navegación -->

  <main></main>

  <?php include 'vistas/piePagina.html'; ?>

  <script src="app/scripts/jquery.js"></script>
  <script src="app/scripts/principal.js"></script>
</body>
</html>
