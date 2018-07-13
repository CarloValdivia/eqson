<?php

require '../modelos/Usuarios.php';

$data = new Usuarios();
$data->conectar();

$nombre = $_POST['nombre_usuario'] ?? '';
$clave = $_POST['contrasena_usuario'] ?? '';
$direccion = $_POST['direccion_domicilio'] ?? '';
$privilegio = $_POST['privilegio'] ?? '';

$usuarioYaExiste = false;

if ($nombre) {
    $resultado = $data->agregarUsuario($nombre, $clave, $direccion, $privilegio);

    if (!$resultado)  {
        $usuarioYaExiste = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Eqson: Usuarios de la tienda</title>
  <link href="../app/estilos/formularios.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="" method="POST">
        <h1>Registro de usuarios</h1>
        <p>Campos requeridos son marcados con un <strong><abbr title="requerido">*</abbr></strong>.</p>
        <section>
            <h2>Información general</h2>
            <fieldset>
                <legend>Privilegios</legend>
                <ul>
                    <li>
                        <label for="administrador">
                            <input type="radio" id="administrador" name="privilegio" value="1" required>
                            Administrador
                        </label>
                    </li>
                    <li>
                        <label for="cliente">
                            <input type="radio" id="cliente" name="privilegio" value="0" required>
                            Usuario normal (Cliente)
                        </label>
                    </li>
                </ul>
            </fieldset>
            <p>
                <label for="nombre">
                    <span>Nombre: </span>
                    <strong><abbr title="requerido">*</abbr></strong>
                </label>
                <input type="text" id="nombre" name="nombre_usuario" required>
            </p>
            <? if ($usuarioYaExiste): ?>
            <p style="color=red;">
                Ya existe este usuario
            </p>
            <? endif; ?>
            <p>
                <label for="contrasena">
                    <span>Contraseña: </span>
                    <strong><abbr title="requerido">*</abbr></strong>
                </label>
                <input type="password" id="contrasena" name="contrasena_usuario" required">
            </p>
        </section>
        <section>
            <h2>Información adicional</h2>
            <p>
                <label for="direccion">
                    <span>Dirección del domicilio:</span>
                </label>
                <textarea id="direccion" name="direccion_domicilio"></textarea>
            </p>
        </section>
        <section>
            <p class="button"> <button type="submit">Registrar usuario</button></p>
        </section>
    </form>
</body>
</html>
