<?php

require '../modelos/Productos.php';

$data = new Productos();

$marca =  $_POST['marca_producto'];
$modelo =  $_POST['modelo_producto'];
$imagen =  $_FILES['imagen_producto']['name'] ?? '';
$descripcion =  $_POST['descripcion_producto'];
// Si es que no recibe un valor darle un ''
$especificaciones =  $_POST['especificaciones_producto'] ?? '';
$precioFabrica =  $_POST['precio_fabrica'];
$precioVenta =  $_POST['precio_venta'];
$stock =  $_POST['cantidad'];

// Límite de tamaño es 300 kilobytes
$maxsize = 300000;
if ($imagen && $_FILES['imagen_producto']['size'] <= $maxsize) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/eqson/app/src/images/productos/';
    $uploadfile = $uploaddir . basename($imagen);
    $filepath = 'http://localhost/eqson/app/src/images/productos/' . basename($imagen);
    $mimetype = mime_content_type($_FILES['imagen_producto']['tmp_name']);
    // Extensiones de imágenes aceptadas
    $imagenExtsAceptadas = array(
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    );
    if (in_array($mimetype, $imagenExtsAceptadas)) {
        $resultado = $data->agregarProducto($marca, $modelo, $filepath, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock);
        if ($resultado) {
            move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $uploadfile);
            header('Location: ../vistas/almacen.php');
        } else {
            header('Location: ../vistas/almacen.php?producto=yaExiste');
        }
    } else {
        header('Location: ../vistas/almacen.php?formato=invalido');
    }

} else {
    header('Location: ../vistas/almacen.php?tamano=over300kb');
}
