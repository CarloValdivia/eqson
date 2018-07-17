<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link href="../app/estilos/principal.css" rel="stylesheet" type="text/css">
  <link href="../app/estilos/login.css" rel="stylesheet" type="text/css">
  <title>Eqson: Inicio de sesión</title>
  <style>
    html {
      height: 100%;
    }

    body {
      width: 50%;
      margin: 0 auto;
      background: #456;
      font-family: 'Open Sans', sans-serif;
    }

    .login {
      min-height: calc(86vh - 120px);
    }

    header {
      height: 80px;
    }

    footer {
      height: 40px;
    }

    a:link, a:visited, a:focus{
      color: black;
    }

    a:hover {
      color: white;
    }

    a:active {
      color: #077;
    }

  </style>
</head>
<body>
  <?php include 'cabeceraPagina.html' ?>

  <div class="login">
    <div class="login-triangle"></div>
    <h2 class="login-header">Iniciar Sesión</h2>
    <form class="login-container" action="../controladores/checkLogin.php" method="POST">
      <p><input type="text" placeholder="Usuario" name="nombre_usuario" required></p>
      <p><input type="password" placeholder="Contraseña" name="contrasena" required></p>
      <p><input type="submit" value="Entrar"></p>
      <?php if (isset($_GET["clave"]) && $_GET["clave"] == 'incorrecta'): ?>
        <p style="color: red;">Contraseña incorrecta</p>
      <?php endif; ?>
      <?php if (isset($_GET["usuario"]) && $_GET["usuario"] == 'desconocido'): ?>
        <p style="color: red;">No existe este usuario</p>
      <?php endif; ?>
    </form>
  </div>

  <p><a href="../index.php">Página principal</a></p>
  <?php include 'piePagina.html' ?>
</body>
</html>