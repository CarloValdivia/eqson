<?php

require_once '../app/dbConexion.php';

class Usuarios {

    public function listarUsuarios()
    {
        global $pdo;

        $consulta = $pdo->query('SELECT * FROM Usuario');

        return $consulta;
    }

    public function encontrarUsuario($nombre)
    {
        global $pdo;

        $consulta = $pdo->prepare("SELECT * FROM Usuario WHERE nombre = ?");
        $consulta->execute([$nombre]);
        $usuario = $consulta->fetch();

        return $usuario;
    }

    public function agregarUsuario($nombre, $clave, $direccion, $privilegio)
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO Usuario (nombre, clave, direccion, privilegio) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $clave, $direccion, $privilegio]);

        $deleted = $stmt->rowCount();

        return $deleted;
    }
}
