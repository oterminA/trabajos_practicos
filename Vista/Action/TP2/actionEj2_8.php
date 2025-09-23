<?php

if ($_POST) {
    include_once('../../../Control/TP2/controlEj2_8.php'); //controller
    $control = new controlEntradas();
    $edad = $_POST["edad"];
    $estudio = $_POST["estudio"];
    $mensaje = $control->valorEntradas($edad, $estudio);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj2_8.css">
    <title>Document</title>
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