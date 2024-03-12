<?php

require_once "modeloPrincipal.php";

class usuarioModel extends modeloPrincipal
{
    // Modelo para agregar usuarios 
    protected static function modelAgregarUsers($datos)
    {
        $sql = modeloPrincipal::conexion()->prepare("INSERT INTO user (usuario, pass_u, nivel) VALUES(:Usuario, :Clave, :Nivel)");

        $sql->bindParam(":Usuario", $datos['Usuario']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam(":Nivel", $datos['Nivel']);
        $sql->execute();
        return $sql;
    }
}
