<?php
//acá voy a guardar las funciones auxiliares

$ROOT = "";
if (isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] != "") {
    $ROOT = $_SERVER['DOCUMENT_ROOT'] . "/trabajos_practicos/";
} else {
    $ROOT = realpath(__DIR__ . "/..") . "/";
}

if (!defined('ROOT')) {
    define('ROOT', $ROOT);
}

//////DATA_SUBMITTED: esta funcion es para encapsular los envios de post/get de la info del formulario
function data_submitted()
{
    $datos = [];

    if (!empty($_POST)) {
        $datos = $_POST;
    } elseif (!empty($_GET)) {
        $datos = $_GET;
    } //evaluo si vienen por post o get

    foreach ($datos as $clave => $valor) {
        $datos[$clave] = ($valor === "") ? null : $valor;
    }

    if (!empty($_FILES)) { //para poder usarla con ls ejercicios que tienen archivos
        foreach ($_FILES as $clave => $archivo) {
            $datos[$clave] = $archivo;
        }
    }

    return $datos; //retorno los datos del arreglo en un array con la clve siendo el name de la etiqueta y el valor siendo el contenido
}



//////AUTOLOAD: esta funcion es para incluir 'dinamicamente' los objetos del control y del modelo, en lugar de hacer include_once todo el tiempo
spl_autoload_register(function ($className) {
    $directorios = [
        //tengo problemas con el autoloader y cómo me muestra los datos así que voy a ir cambiando el orden según el ejercicio que esté haciendo
        ROOT . 'Modelo/TP5/conector/', 
        ROOT . 'Modelo/TP4/conector/', 
        ROOT . 'Modelo/TP5/',     
        ROOT . 'Modelo/TP4/', 
        ROOT . 'Modelo/',
        ROOT . 'Control/TP5/',     
        ROOT . 'Control/TP4/', 
        ROOT . 'Control/',   
    ];

    foreach ($directorios as $directorio) {
        $archivo = $directorio . $className . '.php';
        $archivo = str_replace('\\', '/', $archivo);
        
        if (file_exists($archivo)) {
            require_once $archivo;
            return;
        }
    }

    if (php_sapi_name() === 'cli') {
        echo "Autoload: No se encontró la clase '$className'.\n";
        echo "Buscando en: " . ROOT . "\n";
    }
});
    