<?php session_start(); ?>
<?php if ($_SESSION['privilegio'] == 1): ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="../app/estilos/formularios.css" rel="stylesheet" type="text/css">
</head>
<body>
  <form action="../controladores/agregarProducto.php" method="POST" enctype="multipart/form-data">
    <h1>Agregar nuevo producto</h1>
    <p>Campos requeridos son mostrados con un <strong><abbr title="Requerido">*</abbr></strong>.</p>
    <section>
      <h2>Información general</h2>
      <p>
        <label for="marca">
          <span>Marca:</span>
          <strong><abbr title="Requerida">*</abbr></strong>
        </label>
        <input type="text" id="marca" name="marca_producto" required>
      </p>
      <p>
        <label for="modelo">
          <span>Modelo:</span>
          <strong><abbr title="Requerido">*</abbr></strong>
        </label>
        <input type="text" id="modelo" name="modelo_producto" required>
      </p>
      <p>
        <label for="imagen">
          <span>Imagen (&lt; 300 kb):</span>
          <strong><abbr title="Se requiere una imagen">*</abbr></strong>
        </label>
        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
        <input type="file" id="imagen" name="imagen_producto" accept="image/*" required>
      </p>
      <?php if (isset($_GET["formato"]) && $_GET["formato"] == 'invalido'): ?>
        <p style="color: red;">Formato de imagen inválido</p>
      <?php endif; ?>
      <?php if (isset($_GET["tamano"]) && $_GET["tamano"] == 'over300kb'): ?>
        <p style="color: red;">Imagen excede los 300 kilobytes</p>
      <?php endif; ?>
      <?php if (isset($_GET["producto"]) && $_GET["producto"] == 'yaExiste'): ?>
        <p style="color: red;">Este producto ya existe en la tienda</p>
      <?php endif; ?>
    </section>
    <section>
      <h2>Descripción y especificaciones</h2>
      <p>
        <label for="descripcion">
          <span>Descripción del producto:</span>
          <strong><abbr title="Requerido">*</abbr></strong>
        </label>
        <textarea id="descripcion" name="descripcion_producto" required></textarea>
      </p>
      <p>
        <label for="especificaciones">
          <span>Características del producto:</span>
        </label>
        <textarea id="especificaciones" name="especificaciones_producto"></textarea>
      </p>
    </section>
    <section>
      <h2>Costos y Stock</h2>
      <p>
        <label for="precioFabrica">
          <span>Precio de fábrica:</span>
          <strong><abbr title="Requerido">*</abbr></strong>
        </label>
        <input type="number" id="precioFabrica" name="precio_fabrica" min="0" max="100000" step="any" required>
      </p>
      <p>
        <label for="precioVenta">
          <span>Precio al consumidor:</span>
          <strong><abbr title="Requerido">*</abbr></strong>
        </label>
        <input type="number" id="precioVenta" name="precio_venta" min="0" max="100000" step="any" required>
      </p>
      <p>
        <label for="cantidad">
          <span># Unidades:</span>
          <strong><abbr title="Requerido">*</abbr></strong>
        </label>
        <input type="number" id="cantidad" name="cantidad" min="1" max="100" step="1" required>
      </p>
    </section>
    <section>
      <p class="button"> <button type="submit">Registrar producto</button> </p>
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