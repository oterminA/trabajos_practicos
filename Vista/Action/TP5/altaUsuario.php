<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();

$controlUs = new AbmUsuario();
$controlR  = new AbmRol();
$controlUR = new AbmUsuarioRol();

$usuario = trim($datos['usnombre'] ?? '');
$pass    = $datos['uspass'] ?? '';
$mail    = $datos['usmail'] ?? '';

if ($usuario === '') {
    header('Location: ../../TP5/registrarse.php?error=datos');
    exit;
} else {
    $existeUsuario = $controlUs->buscar(['usnombre' => $usuario]);

    if (count($existeUsuario) > 0) {
        header('Location: ../../TP5/registrarse.php?error=existe');
        exit;
    }

    $paramUser = [
        'usnombre'        => $usuario,
        'uspass'          => $pass,
        'usmail'          => $mail,
        'usdeshabilitado' => null
    ];

    $idUsuario = $controlUs->alta($paramUser);

    if (!$idUsuario) {
        header('Location: ../../TP5/registrarse.php?error=alta');
        exit;
    } else {

        $roles = $controlR->buscar(['roldescripcion' => 'admin']);

        if (count($roles) === 0) {
            header('Location: ../../TP5/registrarse.php?error=rol');
            exit;
        } else {
            $idRol = $roles[0]->getIdRol();

            $paramUR = [
                'idusuario' => $idUsuario,
                'idrol'     => $idRol
            ];

            $controlUR->alta($paramUR);

            header('Location: ../../TP5/login.php?msg=exito_registro');
            exit;
        }
    }
}
