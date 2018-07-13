<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link href="../app/estilos/principal.css" rel="stylesheet" type="text/css">
    <link href="../app/estilos/login.css" rel="stylesheet" type="text/css">
    <title>Eqson: Inicio de sesión</title>
<style>
  body {
    background: #456;
    font-family: 'Open Sans', sans-serif;
    padding-bottom: 3rem;
  }
</style>
  </head>
  <body>
    <div class="login">
      <div class="login-triangle"></div>
      <h2 class="login-header">Iniciar Sesión</h2>
      <form class="login-container" action="../controladores/login.php" method="POST">
        <p><input type="text" placeholder="Usuario" name="nombre_usuario" required></p>
        <p><input type="password" placeholder="Contraseña" name="contrasena" required></p>
        <p><input type="submit" value="Entrar"></p>
      </form>

      <p><a href="../index.php">Página principal</a></p>
  </body>
</html>
<?php
session_start();

require '../modelos/Usuarios.php';

$data = new Usuarios();
$data->conectar();

$nombre = $_POST['nombre_usuario'];
$clave = $_POST['contrasena'];

$resultado = $data->encontrarUsuario($nombre);
$count = $resultado->rowCount();
if ($count > 0)
{
  $record = $resultado->fetch(PDO::FETCH_ASSOC);
  if (strcmp($clave, $record['clave']) === 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $nombre;
    $_SESSION['admin'] = $record['esAdmin'];
    header('Location: ../index.php');
  } else {
    echo "Contraseña incorrecta!";
    echo "<script>setTimeout(\"location.href = '../vistas/login.html';\",1000);</script>";
  }
} else {
  echo "Usuario no registrado!";
  echo "<script>setTimeout(\"location.href = '../vistas/login.html';\",1000);</script>";
}

?>
