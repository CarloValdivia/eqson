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
