<?php
//esto lleva del index.php al controlador

if ($_POST["accion"] == "peliculas") { //el action funciona como un identificador para saber qué acción ejecutar en el controller, o sea que si lo que está hidden coincide, hago todo esto
    require_once("../../../Control/TP2/controlEj4.php"); //esto es para poder usar la funcion del controlador, acá mando información para que sea resuelta
    $control = new controlPeliculas(); //un new de la clase del controlador
    $titulo = $_POST["inputTitulo"];
    $actores = $_POST["inputActores"];
    $director = $_POST["inputDirector"];
    $guion = $_POST["inputGuion"];
    $produccion = $_POST["inputProduccion"];
    $anio = $_POST["inputAnio"];
    $nacionalidad = $_POST["inputNac"];
    $genero = $_POST["inputGenero"];
    $duracion = $_POST["inputDuracion"];
    $restriccion = $_POST["inlineRadioOptions"];
    $sinopsis = $_POST["textSinopsis"];

    $mensaje = $control->mostrarPeliculas($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $genero, $duracion, $restriccion, $sinopsis); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
}

       
?>
<!DOCTYPE html>
<!-- Recibe lo del action, que este a su vez lo recibe del controller| -->
<html lang="en">
<!-- LE SAQUÉ LA ESTRUCTURA HEADER-FOOTER PORQUE NO ENTRABA BIEN EN LA PANTALLAAAAAAA -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP2/styleEj4.css">
    <title>Document</title>
</head>

<body>
<?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
   
    <div id="mensaje">
        <?php
        echo $mensaje;
        ?>
    <a href="../../TP2/ejercicio_4.php" id="link">volver</a>
    </div> 
        <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?> */
</body>

</html>