<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();
$controlUs = new AbmUsuario();

$param = [
    'idusuario'       => $datos['idusuario'], //traigo el id que viene por $datos
    'usdeshabilitado' => null
];

$modificacion = $controlUs->modificacion($param);

if ($modificacion) {
    header('Location: ../../TP5/vistaAdmin.php?msg=exito_habilitacion');
} else {
    header('Location: ../../TP5/vistaAdmin.php?msg=error_datos');
}
exit;