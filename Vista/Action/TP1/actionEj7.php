<?php
//el action acá sirve como intermediario entre la vista y el controller (con un script php en el medio para poder mostrar el resultado en la vista(html))
    include_once('../../../Control/TP1/controlEj_7.php');//para pasarle los datos al controller, que este haga las operaciones, las devuelva acá para pasarselas al mensaje.php
    include_once '../../../Utils/funciones.php';
    $datos = data_submitted();
    $control = new controlOperaciones();
    $numA = $datos["numA"];
    $numB = $datos["numB"];
    $operacion = $datos["op"]; //acá se guarda la opcion que haya cliqueado el usuario
    $mensaje = $control->realizarOperaciones($numA, $numB, $operacion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP1/style_ej7.css">

    <title>Resolucion</title>
</head>

<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <!-- por alguna razon funciona y no funciona el css -->
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <br>
        <a href="../../TP1/ejercicio_7.php" id="link">volver a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>

</html>