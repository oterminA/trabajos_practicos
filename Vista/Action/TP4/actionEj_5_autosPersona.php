<?php
// otra página “autosPersona.php” que recibe un dni de una persona y muestra los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM.

    include_once '../../../Utils/funciones.php';
    $datos = data_submitted();

    $controlAbmAuto = new AbmAuto(); //creo el obj de la clase en control
    $dni = $datos['dni']; //guardo la patente que puso el usuario
    $param = ['DniDuenio' => $dni]; //tengo q armar un arreglo xq eso es lo que espera la funcion de control
    $autos = $controlAbmAuto->buscar($param); // esto me recupera tooods los autos que estáncargados

    //lo q hago ahora es filtrar esos datos para guardar solo los autos q cumplen con el requsiito de tener ese dni
    $autosXPersona = []; // array vacio
    foreach ($autos as $unAuto) {
        $duenio = $unAuto->getObjDuenio(); //recupero el dni del dueño de cada auto q traje
        if ($duenio && $duenio->getNroDni() == $dni) { //si los dni's coinciden
            $autosXPersona[] = $unAuto; // guardo EL AUTO:
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj5.css">
    <title>Resolucion</title>
</head>

<body>
    <?php include_once '../../Estructura/header.php' ?>

    <main>
        <?php
        if (!is_array($autosXPersona) || count($autosXPersona) === 0) { //o sea si no hay autos en ese array o el array noes un array (xq listar devuelve booleano)
            echo ">En el sistema no hay autos cargados bajo ese DNI.<br><br>";
            echo '<a href="../../TP4/ejercicio_7.php" id="link">>Formulario para agregar un nuevo auto</a><br>';
        } else {
            echo "<table border='2'";
            echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th><th>Dni</th>";
            foreach ($autosXPersona as $objAuto) {
                $duenio = $objAuto->getObjDuenio(); //recupero el dni de la persona DESDE la clase abmauto (delegacion)
                echo "<tr>";
                echo "<td>" . $objAuto->getPatente() . "</td>";
                echo "<td>" . $objAuto->getMarca() . "</td>";
                echo "<td>" . $objAuto->getModelo() . "</td>";
                echo "<td>" . $duenio->getNombre() . " " . $duenio->getApellido() . "</td>";
                echo "<td>" . $duenio->getNroDni() . "</td>";

                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <br>
        <a href="../../TP4/ejercicio5/ejercicio_5.php" id="link">volver</a>
    </main>
    <?php include_once '../../Estructura/footer.php' ?>

</body>

</html>