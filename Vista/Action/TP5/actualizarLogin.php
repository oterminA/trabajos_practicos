<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
$controlUs = new AbmUsuario();

$param = [
    'idusuario' => $datos['idusuario'],
    'usnombre' => $datos['user'],
    'usmail' => $datos['mail'],
    'usdeshabilitado' => null
];

if (!empty($datos['pass'])) {
    $param['uspass'] = $datos['pass'];
}

$modificacion = $controlUs->modificacion($param);
if ($modificacion){
    header('Location: ../../TP5/vistaAdmin.php?msg=exito_actualizacion');
}else {
    header('Location: ../../TP5/vistaAdmin.php?msg=error_datos');
}