<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted(); //traigo los datos que vienen por post o get
$controlUs = new AbmUsuario(); //hago una nueva instancia de abmusuario

$param = [ //hago el parametro para la modificacion con los datos modificados
    'idusuario' => $datos['idusuario'], 
    'usnombre' => $datos['user'],
    'usmail' => $datos['mail'],
    'usdeshabilitado' => null
];

if (!empty($datos['pass'])) { //si la contra la cambió 
    $param['uspass'] = $datos['pass']; //guardo los datos de la nueva compra
}

$modificacion = $controlUs->modificacion($param); //hago la modificacion, si funcionó
if ($modificacion){ //redirijo donde corresponda
    header('Location: ../../TP5/vistaAdmin.php?msg=exito_actualizacion');
}else {
    header('Location: ../../TP5/vistaAdmin.php?msg=error_datos');
}