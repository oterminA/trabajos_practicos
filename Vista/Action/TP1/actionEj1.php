<?php 
include_once '../../Estructura/header.php';  //dir surve para la ruta absoluta del archivo actual

if ($_GET) {
    include_once '../../../Control/TP1/controlEj_1.php';
    $control = new controlNumero(); //un new de la clase del controlador 
    $numero = $_GET["numero"]; 
    $mensaje = $control->numeroPositivo($numero); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="../../Css/TP1/style_ej1.css">
</head>
<body>

    <div>
        <h2><?php echo $mensaje; ?></h2>
        <a href="../../TP1/ejercicio_1.php">Volver al formulario</a>
    </div>

    <?php include_once '../../Estructura/footer.php'; ?>

</body>
</html>
