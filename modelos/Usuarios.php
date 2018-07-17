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
        $data = [$nombre, $clave, $direccion, $privilegio];
        $inserted = true;

        try {
            $pdo->prepare("INSERT INTO Usuario VALUES (?,?,?,?)")->execute($data);
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
