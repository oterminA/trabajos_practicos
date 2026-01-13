<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();
$controlUs = new AbmUsuario();

$usuario = $datos['usnombre'];

$revisarUser = $controlUs->buscar(['usnombre' => $usuario]);
if ($revisarUser) {
    if ($controlUs->baja($datos)) {
        header('Location: ../../TP5/listarUsuario.php?exito_baja');
    } else {
        header('Location: ../../TP5/listarUsuario.php?error=fallo_baja');
    }
}
