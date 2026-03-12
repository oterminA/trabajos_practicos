<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted(); //traigo los datos por post o get

//nuevas instancias de las clases involucradas
$controlUs = new AbmUsuario();
$controlR  = new AbmRol();
$controlUR = new AbmUsuarioRol();

$datos['usnombre'] = $datos['usnombre'] ?? $datos['user'] ?? null;
$datos['uspass']   = $datos['uspass']   ?? $datos['pass'] ?? null;
$datos['usmail']   = $datos['usmail']   ?? $datos['mail'] ?? null;
$datos['usdeshabilitado'] = null;

$existeUsuario = $controlUs->buscar([ //reviso el usuario para saber si existe
    'usnombre' => $datos['usnombre']
]);

if ($existeUsuario) { //si existe lo redirijo al login para que se haga una cuenta nueva
    header('Location: ../../TP5/registrarse.php?error=nombre_repetido');
} else {
    $okAlta = $controlUs->alta($datos); //sino hago el alta
    if (!$okAlta) {
        header('Location: ../../TP5/registrarse.php?error=fallo_alta');
    } else {
        $idUsuario = $usuarioNuevo[0]->getIdUsuario();

        $roles = $controlR->buscar([
            'roldescripcion' => 'cliente'
        ]);
        if (!$roles) {
            header('Location: ../../TP5/registrarse.php?error=no_rol');
        } else {
            $idRol = $roles[0]->getIdRol();

            $paramUR = [
                'idrol'     => $idRol,
                'idusuario' => $idUsuario
            ];

           $altaUR= $controlUR->alta($paramUR);
           if ($altaUR){
            header('Location: ../../TP5/login.php?msg=ok');
           }else{
            header('Location: ../../TP5/registrarse.php?error');
           }
        }
    }
}











exit;
