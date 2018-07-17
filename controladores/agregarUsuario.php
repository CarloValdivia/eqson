<?php

require '../modelos/Usuarios.php';

$data = new Usuarios();

$nombre = $_POST['nombre_usuario'];
$clave = $_POST['contrasena_usuario'];
// Si es que no especifica domicilio asignarle $x = ""
$direccion = $_POST['direccion_domicilio'] ?? '';
$privilegio = $_POST['privilegio'];

$resultado = $data->agregarUsuario($nombre, $clave, $direccion, $privilegio);

if ($resultado)  {
    header('Location: ../vistas/usuarios.php');
} else {
    header('Location: ../vistas/usuarios.php?usuario=repetido');
}
