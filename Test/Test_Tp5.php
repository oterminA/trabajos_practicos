<?php
include_once __DIR__ . '/../Utils/funciones.php';

$bd = new BaseDatos();
$ctrlRol = new AbmRol();
$ctrlUsuario = new AbmUsuario();
$ctrlUsuarioRol = new AbmUsuarioRol();

//altas
// $paramRol1 = ['roldescripcion'=> 'cliente'];
// $altaRol1 = $ctrlRol->alta($paramRol1);
// if ($altaRol1){
//     echo "ALTA REALIZADA.\n";
// }else{
//     echo "ERROR.\n";
// }

// $paramUser1 = ['usnombre'=> 'caro', 'uspass'=> '0123', 'usmail'=> 'caro@admin.com', 'usdeshabilitado'=> null];
// $altaUser1 = $ctrlUsuario->alta($paramUser1);
// if ($altaUser1){
//     echo "ALTA REALIZADA.\n";
// }else{
//     echo "ERROR.\n";
// }

// $paramUR1 = ['idrol'=> 4, 'idusuario'=> 46];
// $altaUR1 = $ctrlUsuarioRol->alta($paramUR1);
// if ($altaUR1){
//     echo "ALTA REALIZADA.\n";
// }else{
//     echo "ERROR.\n";
// }


//modificacion
// $param = [
//     'idusuario'=> 1,
//     'usnombre' => 'caro',
//     'uspass'=> 1234,
//     'usmail' => 'carolina@caro.com',
//     'usdeshabilitado'=> ''
// ];
// $mod = $ctrlUsuario->modificacion($param);
// if ($mod){
//     echo "MODIFICACION REALIZADA.\n";
// }else{
//     echo "ERROR.\n";
// }