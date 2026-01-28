<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();
$controlUs = new AbmUsuario();

$param = [
    'idusuario' => $datos['idusuario'],
    'usnombre' => $datos['usnombre'],
    'usmail' => $datos['usmail'],
    'usdeshabilitado' => null
];

if (!empty($datos['uspass'])) { //esto es por si la contra viene vacia porque es opcional
    $param['uspass'] = $datos['uspass'];
}

$modificacion = $controlUs->modificacion($param);

if ($modificacion) {
    header('Location: ../../TP5/vistaAdmin.php?msg=exito_actualizacion');
} else {
    header('Location: ../../TP5/vistaAdmin.php?msg=error_datos');
}
exit;
