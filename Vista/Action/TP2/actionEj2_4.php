<?php

//FUNCIONA la modificacion de la edad mediante la url gracias al method="get"

    include_once('../../../Control/TP2/controlEj2_4.php'); //controller
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlInformacion();
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $edad = $datos['edad'];
    $direccion = $datos['direccion']; 
    $mensaje = $control -> calcularMayoriaEdad($nombre, $apellido, $edad, $direccion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_4.css">
    <title>Document</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <a href="../../TP2/ejercicio_2_4.php">volver</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>