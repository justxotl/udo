<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo COMPANY ?></title>
    <?php include "./view/inc/estilos.php"; ?>

  
</head>

<body>
    <?php
    $peticionAjax = false;
    require_once "./controllers/vistasControl.php";
    $ins_view = new vistasControl(); //Ins_view -> Instancias a las vistas

    $view = $ins_view->control_obtener_view();

    if ($view == "login" || $view == "404") {
        require_once "./view/contenidos/" . $view . "-alvarez.php";
    } else {
        session_start(['name' => 'UDO']);
        require_once "./controllers/loginControl.php";
        $lc = new loginControl();
        if (!isset($_SESSION['token_UDO']) || !isset($_SESSION['usuario_UDO']) || !isset($_SESSION['nivel_UDO']) || !isset($_SESSION['id_UDO'])){
            echo $lc->controlForzarCierreSesion();
            exit();
        }
    ?>

            
                <?php
                include "./view/inc/barraSuperior.php";

                include $view;
                ?>
    
    <?php
        include "./view/inc/cerrarSesion.php";
    }
    include "./view/inc/script.php";
    ?>

</body>

</html>