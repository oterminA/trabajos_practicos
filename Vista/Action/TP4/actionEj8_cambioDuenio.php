<!DOCTYPE html>
<!-- ... estos datos deberán ser enviados a una página “accionCambioDuenio.php” en donde se realice cambio del dueño del auto de la patente
ingresada en el formulario. Mostrar mensajes de error en caso de que el auto o la persona no se encuentren
cargados. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/TP4/styleEj8.css">
    <title>Resolucion</title>
</head>

<body>
<?php include_once '../../Estructura/header.php'; ?>

    <div id="divMain">
        <?php
        include_once '../../../Utils/funciones.php';
        $datos = data_submitted();

            $controlAuto = new AbmAuto();
            $controlPersona = new AbmPersona();

            $patente = $datos["patente"];
            $dniNuevo = $datos["dniNuevo"]; // este es el nuevo dueño

            $paramAuto = ["Patente" => $patente];
            $paramPersona = ["NroDni" => $dniNuevo];

            $autoExiste = $controlAuto->buscar($paramAuto);
            $personaExiste = $controlPersona->buscar($paramPersona);

        if ((is_array($autoExiste) && count($autoExiste) > 0) &&
            (is_array($personaExiste) && count($personaExiste) > 0)
        ) {
            $auto = $autoExiste[0]; //con esto recupero el obj auto asociado a esa patente
            $paramModificacion = [ //ordeno los datos q quiero pasarle a la funcion x control
                'Patente' => $patente,
                'Marca' => $auto->getMarca(),
                'Modelo' => $auto->getModelo(),
                'DniDuenio' => $dniNuevo
            ];

            $modificado = $controlAuto->modificacion($paramModificacion); //esto da true o false

            if ($modificado) {
                echo ">Se cambió correctamente el dueño del auto.<br>";
                echo '<a href="../../TP4/ejercicio_8.php">>Volver al formulario</a>';
                echo '<a href="../../TP4/ejercicio5/ejercicio_5.php">>Ver lista de autos y dueños</a>';
            } else {
                echo ">Ocurrió un error al modificar los datos.<br>";
                echo '<a href="../../TP4/ejercicio_8.php">>Volver al formulario</a>';

            }
        } else {
            echo ">Algunos datos ingresados no existen en el sistema.<br>";
            echo '<a href="../../TP4/ejercicio_8.php">>Volver al formulario</a>';
            echo '<a href="../../TP4/ejercicio5/ejercicio_5.php">>Ver lista de autos y dueños</a>';
        }

        ?>
    </div>
<?php include_once '../../Estructura/footer.php'; ?>

</body>

</html>