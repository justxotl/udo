<?php
if ($_SESSION['nivel_UDO'] != 1) {
	echo $lc->controlForzarCierreSesion;
	exit();
}
?>
<div class="container mt-5">
    <h2>Registrar de Usuario</h2>
    <form method="post" data-form="save" class=" FormularioAjax" action="<?php echo SERVERURL?>ajax/ajaxUsuario.php">
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="pass_u" id="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Repetir Contraseña:</label>
            <input type="password" class="form-control" name="confirm_pass_u" id="confirm_password" required>
        </div>
        <div class="form-group">
            <label for="role">Cargo:</label>
            <select class="form-control" name="nivel">
                <option value="2">Usuario normal</option>
                <option value="1">Administrador</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Registrar</button>
    </form>
</div>


<div class="container mt-5">
    <center>
        <h2>CRUD</h2>
    </center>




    <table class='table'>
        <thead>";
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Cargo</th>
                <th>Eliminar</th>
            </tr>

        </thead>
    <tbody>
    <tr>
                <td></td>
                <td>td>
                <td></td>
            <td><a href='' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>
        </tbody>
    </table>
</div>
