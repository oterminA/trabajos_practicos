<?php

//este script solo tiene el $_post y llama al controller
include_once("../../../Control/TP2/controlEj2_1.php"); //esto es para poder usar la funcion del controlador, acá mando información para que sea resuelta
include_once '../../../Utils/funciones.php';
$datos = data_submitted();
$control = new controlNumero(); //un new de la clase del controlador
$numero = $datos["numero"];
$mensaje = $control->numeroPositivo($numero); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_1.css">
    <title>Document</title>
</head>

<body>
    <?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>

        <a href="../../TP2/ejercicio_2_1.php">Volver al formulario</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>

</body>

</html>