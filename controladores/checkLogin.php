<?php

session_start();

require '../modelos/Usuarios.php';

$data = new Usuarios();

$nombre = $_POST['nombre_usuario'];
$clave = $_POST['contrasena'];

$record = $data->encontrarUsuario($nombre);
if ($record) {
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
