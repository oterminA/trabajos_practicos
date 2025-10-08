<?php
include_once '../../../Utils/funciones.php';
$datos = data_submitted();

    $controlAbmAuto = new AbmAuto(); //creo el obj de la clase en control
    $patente = $datos['patente']; //guardo la patente que puso el usuario
    $param = ['Patente' => $patente]; //tengo q armar un arreglo xq eso es lo que espera la funcion de control
    $arrayAutosPatente = $controlAbmAuto->buscar($param); //guardo lo que tira la funcion esa, es un arreglo

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj4.css">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php include_once '../../Estructura/header.php' ?>
    <main>
        <?php
        if (!is_array($arrayAutosPatente) || count($arrayAutosPatente) === 0) { //o sea si no hay autos en ese array o el array noes un array (xq listar devuelve booleano)
            echo ">No se encontró el auto con la patente ingresada.\n";
            echo '<a href="../../TP4/ejercicio_7.php">>Formulario para ingresar un nuevo vehiculo</a>';
        } else {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>";
            foreach ($arrayAutosPatente as $objAuto) {
                $duenio = $objAuto->getObjDuenio(); //recupero el obj persona por delegacion
                echo "<tr>";
                echo "<td>" . $objAuto->getPatente() . "</td>";
                echo "<td>" . $objAuto->getMarca() . "</td>";
                echo "<td>" . $objAuto->getModelo() . "</td>";
                echo "<td>" . $duenio->getApellido() . ", " . $duenio->getNombre() . "<br> Dni:" . $duenio->getNroDni() . "</td>"; //pongo algunos datos del duenño
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <br>
        <a href="../../TP4/ejercicio_4.php" id="link">>volver al buscador</a>
    </main>
    <?php include_once '../../Estructura/footer.php'; ?>

</body>

</html>