<?php
    include_once('../../../Control/TP1/controlEj_8.php');
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
    <link rel="stylesheet" href="../../Css/TP1/style_ej8.css">
    <title>Document</title>
</head>
<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <br>
        <a href="../../TP1/ejercicio_8.php" id="link">volver al formulario</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>
</html>