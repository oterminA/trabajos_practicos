<?php

//habiendolo hecho con get y post, la unica diferencia que vi fue la manera en la que la informacion se mostró en la URL, con get me muestra clave=valor y con post solo la direccion php que especifiqué en el action
    include_once '../../../Control/TP2/controlEj2_3.php'; //para poder pasarle la informacion al controller
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlInformacion();
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $edad = $datos['edad'];
    $direccion = $datos['direccion'];
    $mensaje = $control ->mostrarInformacion($nombre, $apellido, $edad, $direccion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_3.css">
    <title>Document</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <a href="../../TP2/ejercicio_2_3.php"> volver a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>