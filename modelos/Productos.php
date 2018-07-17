<?php

require_once '../app/dbConexion.php';

class Productos {

    public function listarProductos()
    {
        global $pdo;

        $consulta = $pdo->query("SELECT * FROM Producto");

        return $consulta;
    }

    public function agregarProducto($marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock)
    {
        global $pdo;

        $sql = "INSERT INTO Producto (marca, modelo, imagen, descripcion, especificaciones, precioFabrica, precioVenta, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $pdo->prepare($sql)->execute([$marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock]);
    }
}
