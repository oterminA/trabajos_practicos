<?php
//esto lleva del index.php al controlador

    include_once('../../../Control/TP3/controlEj_3.php');//esto es para poder usar la funcion del controlador, acá mando información para que sea resuelta
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlPeliculas(); //un new de la clase del controlador
    $titulo = $datos["inputTitulo"];
    $actores = $datos["inputActores"];
    $director = $datos["inputDirector"];
    $guion = $datos["inputGuion"];
    $produccion = $datos["inputProduccion"];
    $anio = $datos["inputAnio"];
    $nacionalidad = $datos["inputNac"];
    $genero = $datos["inputGenero"];
    $duracion = $datos["inputDuracion"];
    $restriccion = $datos["inlineRadioOptions"];
    $sinopsis = $datos["textSinopsis"];

    // Directorio donde se guarda el archivo 
    $archivo = $datos['archivo'];
    $dirFisica = 'C:\\xampp\\htdocs\\trabajos_practicos\\Vista\\Assets/'; //barra invertida doble. Esta es la direccion FISICA de donde se va a guardar el archivo 
    $dirWeb = '/trabajos_practicos/Vista/Assets/' . basename($archivo['name']); //tengo que poner la tura cimpleta porque sino no muestra la imagen, solo el alt

    $dirWeb = str_replace('\\', '/', $dirWeb); // refuerza que no queden barras invertidas


    $mensaje = $control->mostrarPeliculas($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $genero, $duracion, $restriccion, $sinopsis, $archivo, $dirFisica, $dirWeb); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP3/styleEj_3.css">
    <title>Resolucion</title>
</head>

<body>
<?php include_once '../../Estructura/header.php' ?>
    <div id="mensaje">
        <?php
            echo $mensaje;
        ?>
        <br>
        <a href="../../TP3/ejercicio_3.php">volver al formulario</a>
    </div>
    <?php include_once '../../Estructura/footer.php' ?>
</body>

</html>