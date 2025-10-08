<?php

    include_once('../../../Control/TP2/controlEj2_5.php'); //para pasarle informacion al controller
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlInformacion();
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $edad = $datos['edad'];
    $genero = $datos['genero'];
    $direccion = $datos['direccion'];
    $est = $datos['est'];

    $mensaje = $control->mostrarInformacion($nombre, $apellido, $edad, $genero, $direccion, $est);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_5.css">
    <title>Resolucion</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <br>
        <a href="../../TP2/ejercicio_2_5.php">volver a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>