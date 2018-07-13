<?php
session_start();

require '../modelos/Usuarios.php';

$data = new Usuarios();
$data->conectar();

$nombre = $_POST['nombre_usuario'] ?? '';
$clave = $_POST['contrasena'] ?? '';

$claveIncorrecta = false;
$usuarioNoExiste = false;

if ($nombre and $clave) {
    $resultado = $data->encontrarUsuario($nombre);
    $filas = $resultado->rowCount();
    if ($filas > 0) {
        $record = $resultado->fetch(PDO::FETCH_ASSOC);
        if (strcmp($clave, $record['clave']) === 0) {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['privilegio'] = $record['esAdmin'];
            header('Location: ../index.php');
        } else {
            $claveIncorrecta = true;
        }
    } else {
        $usuarioNoExiste = true;
    }
}
?>

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
      <form class="login-container" action="" method="POST">
        <p><input type="text" placeholder="Usuario" name="nombre_usuario" required></p>
        <p><input type="password" placeholder="Contraseña" name="contrasena" required></p>
        <p><input type="submit" value="Entrar"></p>
          <? if ($claveIncorrecta): ?>
          <p style="color: red;">Contraseña incorrecta</p>
          <? endif; ?>
          <? if ($usuarioNoExiste): ?>
          <p style="color: red;">No existe este usuario</p>
          <? endif; ?>
      </form>
      <p><a href="../index.php">Página principal</a></p>
  </body>
</html>
