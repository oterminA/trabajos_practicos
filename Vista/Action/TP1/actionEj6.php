<?php

    include_once('../../../Control/TP1/controlEj_6.php'); //para pasarle la info al controller
    include_once '../../../Utils/funciones.php';
    $datos = data_submitted();
    $control = new controlInformacion();
    $nombre=$datos['nombre'];
    $apellido=$datos['apellido'];
    $edad=$datos['edad'];
    $direccion=$datos['direccion'];
    $genero=$datos['genero'];
    $estudios=$datos['est'];
    $deportes=$datos['opciones'];
    $mensaje = $control->revisarInformacion($nombre, $apellido, $edad, $direccion, $genero, $estudios, $deportes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP1/style_ej6.css">
    <title>Document</title>
</head>

<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>

        <br>
        <a href="../../TP1/ejercicio_6.php">volver al formulario</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>

</html>