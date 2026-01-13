<?php
include_once '../Estructura/header.php';
include_once '../../Utils/funciones.php';

$datos = data_submitted();
$objUser = null;

if (isset($_GET['idusuario'])) {
    $abmUsuario = new AbmUsuario();
    $lista = $abmUsuario->listar(['idusuario' => $_GET['idusuario']]);
    if ($lista) {
        $objUser = $lista[0];
    }
}
?>

<div id="wrapper" class="container mt-5">
    <h3>Actualizar datos</h3>
    <form action="../Action/TP5/actualizarLogin.php" method="POST" class="needs-validation" novalidate>
    <input type="hidden" name="idusuario"
       value="<?php echo $objUser->getIdUsuario(); ?>">


        <div class="col-md-6 mb-3">
            <label>Usuario</label>
            <input type="text" class="form-control" name="user" value="<?php echo $objUser ? $objUser->getNombre() : '' ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="text" class="form-control" name="mail" value="<?php echo $objUser ? $objUser->getMail() : '' ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nueva Contraseña</label>
            <input type="password" class="form-control" name="pass" placeholder="Ingrese nueva clave(opcional)">
        </div>
        <div class="col-12">
            <button class="btn btn-success" type="submit">Guardar Cambios</button>
            <a href="listarUsuario.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>