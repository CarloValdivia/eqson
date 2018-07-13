<?php
class Usuarios {
  protected $conexion = null;

  public function conectar()
  {
    $this->conexion = new PDO("mysql:host=localhost;dbname=eqson", "root", "");
  }

  public function listarUsuarios()
  {
    $consulta = $this->conexion->prepare("SELECT * FROM Usuario");
    $consulta->execute();

    return $consulta;
  }

  public function encontrarUsuario($nombre)
  {
    $consulta = $this->conexion->prepare("SELECT * FROM Usuario WHERE nombre='$nombre'");
    $consulta->execute();

    return $consulta;
  }

  public function agregarUsuario($nombre, $clave, $direccion, $privilegio)
  {
    $sql = "INSERT INTO Usuario (nombre, clave, direccion, privilegio) VALUES (?, ?, ?, ?) ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$nombre, $clave, $direccion, $privilegio]);

    $deleted = $stmt->rowCount();

    return $deleted;
  }
}
