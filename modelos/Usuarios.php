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
}
?>
