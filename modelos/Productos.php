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
        $data = [$marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock];
        $sql = "INSERT INTO Producto (marca, modelo, imagen, descripcion, especificaciones, precioFabrica, precioVenta, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $inserted = true;

        try {
            $pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
            if (strpos($e->getMessage(), $existingkey) !== FALSE) {
                $inserted = false;
            } else {
                throw $e;
            }
        }

        return $inserted;
    }
}
