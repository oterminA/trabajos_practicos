<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj7.css">
    <title>Ejercicio 7</title>
</head>

<body>
<?php include_once '../../Estructura/header.php' ?>

    <main>
    <?php
    include_once '../../../Utils/funciones.php';
    $datos = data_submitted();

        $controlPersona = new AbmPersona;
        $dni = $datos["dni"]; //guardo acá el dni que entra por el post, q es el del dueño del auto
        $existePersona = $controlPersona->buscar(['NroDni' => $datos['dni']]); //acá busco si la personaestá en la bd

    if (is_array($existePersona) && count($existePersona) > 0) { //si la persona está en la bd solo tengo que guardar los datos del auto+el dni
        echo ">Ese DNI ya está ingresado en el sistema.<br>";
        echo ">... Agregando los datos del nuevo vehiculo ...<br>";
        $controlAuto =  new AbmAuto();
        $marca = $_POST['marca'];
        $patente = $_POST['patente'];
        $modelo = $_POST['modelo'];
        $dni = $_POST["dni"];
        $param = ["Patente" => $patente, "Marca" => $marca, "Modelo" => $modelo, "DniDuenio" => $dni];
        $cargarAuto = $controlAuto->alta($param);

        echo $cargarAuto ?  "<br> >Datos cargados con éxito.<br>" : "<br> >Ocurrió un problema.<br>";

        echo '<br><a href="../../TP4/ejercicio_7.php">>Volver</a><br>';
    
        echo '<a href="../../TP4/ejercicio5/ejercicio_5.php">>Visualizar los vehiculos de cada persona</a><br>';

    } else { //si no está en la bd tengo que mandarla al otro script para que llene los datos del dueño y vuelva
        echo ">Ese DNI no está en el sistema.<br>";
        echo '<a href="../../TP4/ejercicio_6.php">>Ir al formulario para ingresar una nueva persona</a><br>';
        echo '<a href="../../TP4/ejercicio_7.php">>Volver al formulario de vehiculo</a><br>';

    }

    ?>
    </main>
<?php include_once '../../Estructura/footer.php'; ?>

</body>

</html>