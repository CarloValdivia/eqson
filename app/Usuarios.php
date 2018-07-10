<?php
class Usuarios {
  protected $conexion = null;

  public function conectar()
  {
    $this->conexion = new PDO("mysql:host=localhost;dbname=eqson", "root", "");
  }

  public function listaUsuarios()
  {
    $query = $this->conexion->prepare("SELECT * FROM Usuario");
    $query->execute();

    return $query;
  }
}
?>
