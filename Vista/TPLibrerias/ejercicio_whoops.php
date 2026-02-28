<!DOCTYPE html>
<!-- Para el ejercicio donde se implementa whoops solamente se va a usar la no declaracion de variables para ver formato tira -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP4/styleEj3.css">
    <title>Ejercicio usando whoops</title>
</head>

<body>
    <main>
        <div id="wrapper">

            <?php
            include_once '../Estructura/header.php';
            include_once '../../Utils/funciones.php';
            include_once '../../Lib/whoops.php';
            $datos = data_submitted();
    
            $auto = new AbmAuto(); //SE PUSO UN NOMBRE DIFERENTE A ESTA VARIABLE, tendría que ser $objAbmAuto pero para uqe funcione el whoops hay que darle un error y por eso pongo una variable erronea
            $arrayAutos = $objAbmAuto->buscar(null); // ESTA VARIABLE REFERENCIADA NO EXISTE
            if (!is_array($arrayAutos) || count($arrayAutos) === 0) { //o sea si no hay autos en ese array o el array noes un array (xq listar devuelve booleano)
                echo ">No hay autos cargados.\n";
            } else {
                echo "<h2>Listado de vehiculos:</h2>";
                echo "<table border='1' cellpadding='5'>";
                echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>";
                foreach ($arrayAutos as $objAuto) {
                    $duenio = $objAuto->getObjDuenio(); //recupero el dni de la persona DESDE la clase abmauto (delegacion)
                    echo "<tr>";
                    echo "<td>" . $objAuto->getPatente() . "</td>";
                    echo "<td>" . $objAuto->getMarca() . "</td>";
                    echo "<td>" . $objAuto->getModelo() . "</td>";
                    echo "<td>" . $duenio->getNombre() . " " . $duenio->getApellido() . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            include_once '../Estructura/footer.php';

            ?>
        </div>

    </main>
</body>

</html>