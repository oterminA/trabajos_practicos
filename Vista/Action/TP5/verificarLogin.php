<?php
include_once '../../../Utils/funciones.php'; 
$datos = data_submitted(); 
$user = $datos['user'];
$pass = $datos['pass'];

$sesion = new Session();

if ($sesion->validar()) {
        header('Location: ../../TP5/listarUsuario.php');
} else {
    header('Location: ../../TP5/login.php?error=1');
}