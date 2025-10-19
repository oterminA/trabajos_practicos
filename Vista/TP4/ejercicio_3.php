<!DOCTYPE html>
<!-- Ejercicio 3 –Crear una pagina php “VerAutos.php”, en ella usando la capa de control correspondiente
mostrar todos los datos de los autos que se encuentran cargados, de los dueños mostrar nombre y apellido.
En caso de que no se encuentre ningún auto cargado en la base mostrar un mensaje indicando que no hay
autos cargados. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP4/styleEj3.css">
    <title>Ejercicio 3</title>
</head>

<body>
    <main>
        <div id="wrapper">

            <?php
            include_once '../Estructura/header.php';
            include_once '../../Utils/funciones.php';
            $datos = data_submitted();
    
            $objAbmAuto = new AbmAuto(); //creo el obj de la clase en control
            $arrayAutos = $objAbmAuto->buscar(null); // desde el control busco los autos y los guardo en esa variable
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