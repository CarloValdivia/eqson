<?php

require '../modelos/Productos.php';

$data = new Productos();
$data->conectar();

// Agregando productos
$marca =  $_POST['marca_producto'];
$modelo =  $_POST['modelo_producto'];
$imagen =  $_POST['imagen_producto'];
$descripcion =  $_POST['descripcion_producto'];
// Si es que no recibe un valor darle un ''
$especificaciones =  $_POST['especificaciones_producto'] ?? '';
$precioFabrica =  $_POST['precio_fabrica'];
$precioVenta =  $_POST['precio_venta'];
$stock =  $_POST['cantidad'];

$data->agregarProducto($marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock);
header('Location: ../vistas/almacen.html');

