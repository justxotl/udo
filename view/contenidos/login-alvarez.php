
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Aplicacion para registro de reposos UDO</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password_lg" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['username'])&& isset($_POST['password_lg'])){
        require_once "./controllers/loginControl.php";

        $ins_login= new loginControl();

        echo $ins_login -> controlIniciarSesion();
    }
?>
