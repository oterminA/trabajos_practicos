<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP5/login.css">
    <title>Listado de Usuarios</title>
</head>

<body>
    <?php
    include_once '../../Utils/funciones.php';
    $sesion = new Session();

    if (!$sesion->validar()) { //si no se valida la sesion redirijo al login
        header('Location: ../TP5/login.php');
        exit;
    }
    $abmUsuario = new AbmUsuario();
    $arrayUsers = $abmUsuario->listar(); //esto es para usarlo más abajo
    include_once '../Estructura/header.php';

    ?>

    <div class="container mt-5" id="wrapper">
        <h2>Lista de Usuarios</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($arrayUsers)) {
                    foreach ($arrayUsers as $objUser) {
                        $estado = ($objUser->getDeshabilitado() == null || $objUser->getDeshabilitado() == "0000-00-00 00:00:00") ? "Habilitado" : "Deshabilitado"; //esto es para mostrar el estado habilitado o deshabilitado del usuario, lo muestro solamente en la vista del admin

                        echo '<tr>';
                        echo '<td>' . $objUser->getIdUsuario() . '</td>';
                        echo '<td>' . $objUser->getNombre() . '</td>';
                        echo '<td>' . $objUser->getMail() . '</td>';
                        echo '<td>' . $estado . '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-primary btn-accion" href="../TP5/actualizarUsuario.php?idusuario=' . $objUser->getIdUsuario() . '">Actualizar</a>'; 
                        echo '<a class="btn btn-danger btn-accion" href="../Action/TP5/eliminarLogin.php?idusuario=' . $objUser->getIdUsuario() . '">Deshabilitar</a>';
                        echo '<a class="btn btn-secondary btn-accion" href="../Action/TP5/habilitarLogin.php?idusuario=' . $objUser->getIdUsuario() . '">Habilitar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No hay usuarios registrados.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="col-12">
            <a class="btn btn-success w-25" href="../TP5/registrarse.php">Registrar usuario</a>
            <a class="btn btn-warning w-25" href="../Action/TP5/cerrarSesion.php">Cerrar sesión</a>

        </div>
    </div>
    <?php include_once '../Estructura/footer.php' ?>
</body>

</html>