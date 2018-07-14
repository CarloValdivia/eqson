<?php

session_start();

require '../modelos/Usuarios.php';

$data = new Usuarios();
$data->conectar();

$nombre = $_POST['nombre_usuario'];
$clave = $_POST['contrasena'];

$resultado = $data->encontrarUsuario($nombre);
$filas = $resultado->rowCount();
if ($filas > 0) {
    $record = $resultado->fetch(PDO::FETCH_ASSOC);
    if (strcmp($clave, $record['clave']) === 0) {
        $_SESSION['usuario'] = $nombre;
        $_SESSION['privilegio'] = $record['privilegio'];
        header('Location: ../index.php');
    } else {
        header('Location: ../vistas/login.php?clave=incorrecta');
    }
} else {
    header('Location: ../vistas/login.php?usuario=desconocido');
}
