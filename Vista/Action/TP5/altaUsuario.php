<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();

$controlUs = new AbmUsuario();
$controlR  = new AbmRol();
$controlUR = new AbmUsuarioRol();

$usuario = trim($datos['usnombre'] ?? ''); //esto es: que me de el valor o sino vacio
$pass    = $datos['uspass'] ?? '';
$mail    = $datos['usmail'] ?? '';

if ($usuario === '') {
    header('Location: ../../TP5/registrarse.php?error=datos');
    exit;
} else {
    $existeUsuario = $controlUs->buscar(['usnombre' => $usuario]); //esto me devuelve un array con la info de ese usuario

    if (count($existeUsuario) > 0) { //si no hay nada en el array
        header('Location: ../../TP5/registrarse.php?error=existe');
        exit;
    }

    $paramUser = [
        'usnombre'        => $usuario,
        'uspass'          => $pass,
        'usmail'          => $mail,
        'usdeshabilitado' => null
    ];

    $idUsuario = $controlUs->alta($paramUser); //hago el alta

    if (!$idUsuario) { //si no se hizo el alta
        header('Location: ../../TP5/registrarse.php?error=alta');
        exit;
    } else {

        $roles = $controlR->buscar(['roldescripcion' => 'cliente']); //busco roles que coincidan con cliente

        if (count($roles) === 0) { //si no hay nada en ese array
            header('Location: ../../TP5/registrarse.php?error=rol');
            exit;
        } else {
            $idRol = $roles[0]->getIdRol(); //recupero el id de ese rol, por ejemplo 1 cliente

            $paramUR = [ //hago el param para dar de alta usuario rol
                'idusuario' => $idUsuario,
                'idrol'     => $idRol
            ];

            $controlUR->alta($paramUR);

            header('Location: ../../TP5/login.php?msg=exito_registro');
            exit;
        }
    }
}
