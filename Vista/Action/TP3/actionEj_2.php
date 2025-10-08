<?php
// lo que voy a recibir del $_files es algo asi:
// Array
// (
//     [name] => documento.pdf           // Nombre original del archivo
//     [type] => application/pdf         // Tipo MIME
//     [tmp_name] => /tmp/php123.tmp     // Ruta temporal en el servidor
//     [error] => 0                      // Código de error (0 = todo bien)
//     [size] => 124500                  // Tamaño del archivo en bytes
// )


// Directorio donde se guarda el archivo
$dir = 'C:\\xampp\\htdocs\\trabajos_practicos\\Vista\\Assets/';  //barra invertida doble 
include_once('../../../Control/TP3/controlEj_2.php');
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
$control = new controlArchivo();
    $archivo = $datos['archivo'];
$mensaje = $control ->procesarArchivo($archivo, $dir);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/TP3/styleEj_2.css">
</head>
<body>
    <?php include_once(__DIR__ . '/../../Estructura/header.php');?>
    <div id="divMensaje">
        <textarea name="" id="" cols="30" rows="10">
        <?php 
        echo $mensaje; 
        ?>
        </textarea>
        <a href="../../TP3/ejercicio_2.php" id="link">ir a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php');?>

</body>
</html>