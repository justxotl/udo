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

     // Modelo para actualizar usuarios 
     protected static function modelActualizarUsers($datos)
     {
        $sql=modeloPrincipal::conexion()->prepare("UPDATE user SET pass_u=:Pass, nivel=:Nivel WHERE id=:ID ");

        $sql->bindParam(":Pass", $datos['Pass']);
        $sql->bindParam(":Nivel", $datos['Nivel']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();

        return $sql;
     }
}
