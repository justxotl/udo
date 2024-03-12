
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <?php if ($_SESSION['nivel_UDO'] == 1) { ?>
            <div class="col-md-3">
                <a href="<?php echo SERVERURL ?>usuario" class="btn btn-primary btn-lg btn-block">Administrar Usuarios</a>
            </div>
        <?php } ?>
        <div class="col-md-3">
            <button class="btn btn-info btn-lg btn-block">Registrar Reposo</button>
        </div>
        <?php if ($_SESSION['nivel_UDO'] == 1) { ?>
        <div class="col-md-3">
            <button class="  btn btn-success btn-lg btn-block">Reportes de Reposo</button>
        </div>
        <?php } ?>
        <?php if ($_SESSION['nivel_UDO'] == 1) { ?>
        <div class="  col-md-3">
            <button type="button" class=" btn btn-danger btn-lg btn-block">Gestionar Reposos</button>
        </div>
        <?php } ?>

    </div>
</div>