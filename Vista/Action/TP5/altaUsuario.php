<?php
include_once '../../../Utils/funciones.php';

$datos = data_submitted();
$controlUs = new AbmUsuario();
$controlR = new AbmRol();

$datos['usnombre'] = $datos['usnombre'] ?? $datos['user'];
$datos['uspass']   = $datos['uspass']   ?? $datos['pass'];
$datos['usmail']   = $datos['usmail']   ?? $datos['mail'];
$datos['usdeshabilitado'] = NULL;

$revisarUser = $controlUs->buscar(['usnombre' => $datos['usnombre']]);
if ($revisarUser) {
    header('Location: ../../TP5/registrarse.php?error=nombre_repetido');
    if ($controlUs->alta($datos)) {
        $lista = $controlUs->buscar(['usnombre' => $datos['usnombre']]);
        if (count($lista) > 0) {
            $objUsuario = $lista[0];
            
            $roles = $controlR->buscar(['rodescripcion' => 'cliente']);
            
            if ($roles) {
                $controlUR = new AbmUsuarioRol();
                $paramUR = [
                    'idusuario' => $objUsuario->getIdUsuario(), 
                    'idrol' => $roles[0]->getIdRol()
                ];
                $controlUR->alta($paramUR);
            }
        }
        header('Location: ../../TP5/login.php?msg=ok');
    } else {
        header('Location: ../../TP5/registrarse.php?error=fallo_alta');
    }
}else {
    header('Location: ../../TP5/registrarse.php?error=fallo_alta');
}

