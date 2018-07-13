<?php
class Productos {
    protected $conexion = null;

    public function conectar()
    {
        $this->conexion = new PDO("mysql:host=localhost;dbname=eqson", "root", "");
    }

    public function listarProductos()
    {
        $consulta = $this->conexion->prepare("SELECT * FROM Producto");
        $consulta->execute();

        return $consulta;
    }

    public function agregarProducto($marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock)
    {
        $sql = "INSERT INTO Producto (marca, modelo, imagen, descripcion, especificaciones, precioFabrica, precioVenta, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql)->execute([$marca, $modelo, $imagen, $descripcion, $especificaciones, $precioFabrica, $precioVenta, $stock]);
    }
}
