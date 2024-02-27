<?php

if ($peticionAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}

class modeloPrincipal
{
    /* Funcion que conecta la base de datos */
    protected static function conexion()
    {
        $conexion = new PDO(SGBD, USER, PASS);
        $conexion->exec("SET CHARARTER SET utf8");
        return $conexion;
    }
    /* Funcion que hace consultas basicas */
    protected static function realizar_consulta_simple($consulta)
    {
        $sql = self::conexion()->prepare($consulta);
        $sql->execute();
        return $sql;
    }
}
