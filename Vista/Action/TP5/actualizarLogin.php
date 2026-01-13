<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
$controlUs = new AbmUsuario();


if (isset($datos['idusuario'])) {
    $id = $datos['idusuario'];
    $usuario = $datos['user'];
    $mail = $datos['mail'];


    if (!empty($pass)) {
        $param['uspass'] = $pass;
    }

    $param = [
        'idusuario' => (int)$datos['idusuario'],
        'usnombre' => $datos['user'],
        'usmail' => $datos['mail'],
        'usdeshabilitado' => null
    ];
    
    if (!empty($datos['pass'])) {
        $param['uspass'] = $datos['pass'];
    } else {
        header('Location: ../../TP5/listarUsuario.php?msg=error_modificacion');
    }
} else {
    header('Location: ../../TP5/listarUsuario.php?msg=error_datos');
}
