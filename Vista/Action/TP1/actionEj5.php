<?php

if ($_GET) {
    include_once('../../../Control/TP1/controlEj_5.php'); //para pasarle informacion al controller
    $control = new controlInformacion();
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $edad = $_GET['edad'];
    $genero = $_GET['genero'];
    $direccion = $_GET['direccion'];
    $est = $_GET['est'];

    $mensaje = $control->mostrarInformacion($nombre, $apellido, $edad, $genero, $direccion, $est);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP1/style_ej5.css">
    <title>Document</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <br>
        <a href="../../TP1/ejercicio_5.php">volver a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>