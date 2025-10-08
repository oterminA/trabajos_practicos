<!DOCTYPE html>
<!-- y estos serán enviados a otra página “ActualizarDatosPersona.php” que actualiza los datos de la
persona. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../Css/TP4/styleEj9.css">
    <title>Document</title>
</head>

<body>
<?php include_once '../../../Estructura/header.php'; ?>
    <div id="main">
        <?php
        include_once '../../../../Utils/funciones.php';

        if ($_POST) {
            $controlPersona = new AbmPersona(); //new de abmpersona
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $domicilio = $_POST['domicilio'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $fechaNac = $_POST['fechaNac'];
            $paramModificacion = ['NroDni'=>$dni, 'Apellido'=>$apellido, 'Nombre'=>$nombre, 'fechaNac'=>$fechaNac, 'Telefono'=>$telefono, 'Domicilio'=>$domicilio]; //al param le pongo todos los datos a modificar
            $modificado = $controlPersona->modificacion($paramModificacion); //esto da true o false

            if ($modificado) { //si da true 
                echo ">Los datos se cambiaron correctamente.<br>";
                echo ' <a href="../../../TP4/ejercicio_9.php">>Volver a inicio</a><br>';
                echo ' <a href="../../../TP4/ejercicio5/ejercicio_5.php">>Ver lista de autos y dueños</a>';
            } else { //si da false
                echo ">Ocurrió un error al modificar los datos.<br>";
            }
        }
        ?>
    </div>
    <?php include_once '../../../Estructura/footer.php'; ?>
</body>

</html>