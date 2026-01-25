<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
$user = $datos['usnombre'];
$pass = $datos['uspass'];

$sesion = new Session();

if ($sesion->iniciar($user, $pass)) {

    $rol = $sesion->getRol();

    if ($rol === 'admin') {
        header('Location: ../../TP5/vistaAdmin.php');
    } elseif ($rol === 'cliente'){
        header('Location: ../../TP5/listarUsuario.php');
    }

} else {
    header('Location: ../../TP5/login.php?error');
}
