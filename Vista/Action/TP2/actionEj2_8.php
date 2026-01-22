<?php

    include_once('../../../Control/TP2/controlEj2_8.php'); //controller
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlEntradas();
    $edad = $datos["edad"];
    $estudio = $datos["estudio"];
    $mensaje = $control->valorEntradas($edad, $estudio);   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_8.css">
    <title>Resolucion</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <a href="../../TP2/ejercicio_2_8.php">volver</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>