<?php session_start(); ?>
<?php if ($_SESSION['privilegio'] == 1): ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Eqson: Usuarios de la tienda</title>
  <link href="../app/estilos/formularios.css" rel="stylesheet" type="text/css">
</head>
<body>
  <form action="../controladores/agregarUsuario.php" method="POST">
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
          <span>Nombre de usuario: </span>
          <strong><abbr title="requerido">*</abbr></strong>
        </label>
        <input type="text" id="nombre" name="nombre_usuario" required>
      </p>
      <?php if (isset($_GET["usuario"]) && $_GET["usuario"] == 'repetido'): ?>
      <p style="color:red;">
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
  <p>
    <a href="../index.php">Página principal</a>
  </p>
</body>
</html>
<?php else: ?>
Acceso no autorizado
<?php endif; ?>