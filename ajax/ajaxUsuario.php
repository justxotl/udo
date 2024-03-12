<?php
$peticionAjax = true;
require_once "../config/aplicacion.php";

if (isset($_POST['username'])) {

    // Intancia al controlador 
    require_once "../controllers/usuarioControl.php";
    $ins_usuario = new usuarioControl();

    // Agregar usuario
    if (isset($_POST['username']) && isset($_POST['pass_u'])) {
        echo $ins_usuario->agregarUsuarioControlador();
    }
} else {
    session_start(['name' => 'UDO']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login/");
}
