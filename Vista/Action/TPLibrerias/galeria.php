<?php
include_once '../../Estructura/header.php';
include_once '../../../Utils/funciones.php';

$objAbmAuto = new AbmAuto(); //creo el obj de la clase en control
$arrayAutos = $objAbmAuto->buscar(null); // desde el control busco los autos y los guardo en esa variable
?>

<!DOCTYPE html>
<!-- este script es el que va a mostrar la galeria de imagenes de cada auto, por eso es que se tiene que conectar con la base de datos y usar las funciones pdo (?) para poder recuperar cada imagen y ponerla en un div -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleGregwar.css">
    <title>Galeria de autos</title>
</head>

<body>
    <?php
    include_once '../../Estructura/header.php';
    ?>

    <div id="main-div">
        <?php
        if (!is_array($arrayAutos) || count($arrayAutos) === 0) { //o sea si no hay autos en ese array o el array noes un array (xq listar devuelve booleano)
            echo ">No hay autos cargados.\n";
            echo '<a href="../../TPLibrerias/ejercicio_gregwarImage.php">>Ir al formulario de carga de vehiculos</a>';
        } else { //aca se irian mostrando todas las fotos de los autos
            foreach ($arrayAutos as $objAuto) {
                $imagen = $objAuto->getImagen();
                $patente = $objAuto->getPatente();
                if (!empty($imagen)) {
                    $nombre_archivo = basename($imagen);
                    $ruta_servidor = __DIR__ . '/../Assets/' . $nombre_archivo;

                    $ruta_web = "../Assets/" . $nombre_archivo;

                    if (file_exists($ruta_servidor)) {

                        echo "<div id='mostrarAuto'>";
                        echo "<img src='$ruta_web' alt='Imagen de auto' width='250'>";
                        echo "<p>Numero de patente: '$patente' </p>";
                        echo "</div>";
                    } else {
                        echo ">La imagen no está en la carpeta: " . $ruta_servidor . "<br>";
                    }
                }
            }
            
            echo '<a href="../../TPLibrerias/ejercicio_gregwarImage.php">>Volver al formulario de carga de vehiculos</a>';
        }
        ?>

    </div>

    <?php include_once '../../Estructura/footer.php' ?>
</body>

</html>