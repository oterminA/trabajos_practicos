<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted(); 
$controlUs = new AbmUsuario();

if (isset($datos['idusuario'])) {
    if ($controlUs->baja($datos)) { 
        header('Location: ../../TP5/vistaAdmin.php?exito_baja');
    } else {
        header('Location: ../../TP5/vistaAdmin.php?error=fallo_baja');
    }
}else {
    header('Location: ../../TP5/vistaAdmin.php?error=fallo_id');
}