<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
// var_dump($datos);
// exit;
$user = $datos['usnombre'];
$pass = $datos['uspass'];
// var_dump($datos);
$sesion = new Session();

if ($sesion->iniciar($user, $pass)) { //si iniciar da true:

    $rol = $sesion->getRol(); //obtengo el rol que me da esa funcion

    if ($rol === 'admin') {
        header('Location: ../../TP5/vistaAdmin.php');
    } elseif ($rol === 'cliente'){
        header('Location: ../../TP5/listarUsuario.php');
    }

} else {
    header('Location: ../../TP5/login.php?error?datos');
}
