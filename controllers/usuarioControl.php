<?php

if ($peticionAjax) {
    require_once "../models/usuarioModel.php";
} else {
    require_once "./models/usuarioModel.php";
}

class usuarioControl extends usuarioModel
{

    //Controlador para agregar usuarios 
    public function agregarUsuarioControlador()
    {
        $usuario = $_POST['username'];
        $pass_u = $_POST['pass_u'];
        $confirm_pass_u = $_POST['confirm_pass_u'];

        $nivel = $_POST['nivel'];

        //Comprobar los campos vacios del formulario
        if ($usuario == "" || $pass_u == "" || $confirm_pass_u == "" || $nivel == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Por favor rellene los campos faltantes",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        // verificando si los datos cumplen con el formato

        if (modeloPrincipal::verificarDatos("[a-zA-Z0-9]{3,35}", $usuario)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "El Nombre de Usuario no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if (modeloPrincipal::verificarDatos("[a-zA-Z0-9$@.\-]{7,100}", $pass_u) || modeloPrincipal::verificarDatos("[a-zA-Z0-9$@.\-]{7,100}", $confirm_pass_u)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "Las Contraseñas no coinciden con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        // Comprovando la existencia de un usuario

        $check_user = modeloPrincipal::ejecutarConsultaSimple("SELECT usuario FROM user WHERE usuario='$usuario'");
        if ($check_user->rowCount() > 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "El Usuario que ha ingresado ya se encuentra registrado en el sistema",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }


        // comprobando las contraseñas
        if ($pass_u != $confirm_pass_u) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "Las contraseñas no coinciden",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        } else {
            $pass = $pass_u;
        }

        //Comprovando privilegios

        if ($nivel < 1 || $nivel > 2) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "Como te las arreglaste para tener tantos privilegios",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        $Inf_reg_usu = [
            "Usuario" => $usuario,
            "Clave" => $pass,
            "Nivel" => $nivel
        ];

        $agg_usu = usuarioModel::modelAgregarUsers($Inf_reg_usu);
        if ($agg_usu->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Usuario registrado",
                "Texto" => "Los datos usuario han sido registrado con exito",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "Error en el registro de los datos del Usuario",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }/* Fin de del controlador */
}
