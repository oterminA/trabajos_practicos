<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();

$controlUs = new AbmUsuario();
$controlR  = new AbmRol();
$controlUR = new AbmUsuarioRol();

$datos['usnombre'] = $datos['usnombre'] ?? $datos['user'] ?? null;
$datos['uspass']   = $datos['uspass']   ?? $datos['pass'] ?? null;
$datos['usmail']   = $datos['usmail']   ?? $datos['mail'] ?? null;
$datos['usdeshabilitado'] = null;

$existeUsuario = $controlUs->buscar([
    'usnombre' => $datos['usnombre']
]);

if ($existeUsuario) {
    header('Location: ../../TP5/registrarse.php?error=nombre_repetido');
    exit;
}

$okAlta = $controlUs->alta($datos);

if (!$okAlta) {
    header('Location: ../../TP5/registrarse.php?error=fallo_alta');
    exit;
}

$usuarioNuevo = $controlUs->buscar([
    'usnombre' => $datos['usnombre']
]);

if (!$usuarioNuevo) {
    header('Location: ../../TP5/registrarse.php?error=no_usuario');
    exit;
}

$idUsuario = $usuarioNuevo[0]->getIdUsuario();

$roles = $controlR->buscar([
    'roldescripcion' => 'cliente'
]);

if (!$roles) {
    header('Location: ../../TP5/registrarse.php?error=no_rol');
    exit;
}

$idRol = $roles[0]->getIdRol();

$paramUR = [
    'idrol'     => $idRol,
    'idusuario' => $idUsuario
];

$controlUR->alta($paramUR);

header('Location: ../../TP5/login.php?msg=ok');
exit;
