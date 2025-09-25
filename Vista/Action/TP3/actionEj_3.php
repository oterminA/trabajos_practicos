<?php
//esto lleva del index.php al controlador

if ($_POST) { //el action funciona como un identificador para saber qué acción ejecutar en el controller, o sea que si lo que está hidden coincide, hago todo esto
    include_once('../../../Control/TP3/controlEj_3.php');//esto es para poder usar la funcion del controlador, acá mando información para que sea resuelta
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

    // Directorio donde se guarda el archivo 
    $archivo = $_FILES['archivo'];
    $dirFisica = 'C:\\xampp\\htdocs\\trabajos_practicos\\Vista\\Assets/'; //barra invertida doble. Esta es la direccion FISICA de donde se va a guardar el archivo 
    $dirWeb = '/trabajos_practicos/Vista/Assets/' . basename($archivo['name']); //tengo que poner la tura cimpleta porque sino no muestra la imagen, solo el alt

    $dirWeb = str_replace('\\', '/', $dirWeb); // refuerza que no queden barras invertidas


    $mensaje = $control->mostrarPeliculas($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $genero, $duracion, $restriccion, $sinopsis, $archivo, $dirFisica, $dirWeb); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP3/styleEj_3.css">
    <title>Document</title>
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