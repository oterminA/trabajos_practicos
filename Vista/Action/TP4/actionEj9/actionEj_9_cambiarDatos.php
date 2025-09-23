<!DOCTYPE html>
<!-- ...Estos datos serán enviados a una página “accionBuscarPersona.php”
busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de
documento)... -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../Css/TP4/styleEj9.css">
    <title>Document</title>
</head>

<body>
    <?php
    //tengo que usar dos action aparentemente, o sea entiendo que es al revés del ejercicio anterior
    //formulario -> action y formulario -> action?
    include_once '../../../../Control/TP4/AbmPersona.php';

    if ($_POST) {
        $controlPersona = new AbmPersona();
        $dni = $_POST["dni"]; // recupero el dni q ingresan
        $paramPersona = ["NroDni" => $dni]; //hago el param para la busqueda
        $personaExiste = $controlPersona->buscar($paramPersona); //guardo acá si existe o no
    }

    if (is_array($personaExiste) && count($personaExiste) > 0) { //si la persona existe en la bd, tengo que mandarla al otro fromulario y cambiarle los datos
        $persona = $personaExiste[0]; // guardo el obj persona que se devuelve en el personaExiste
        echo '<div id="main">';//armo todo el formulario

        echo ">El DNI se encuentra en la base de datos.<br>";
        echo ">Se procede a hacer el cambio de datos...<br><br>";

        echo '<h3>Modificar datos</h3>';

        echo '<form action="../actionEj9/actionEj_9_actualizarDatos.php" method="post" onsubmit="return validar()">';
        echo '<input type="hidden" name="dni" value="' . htmlspecialchars($dni) . '">'; //lo pongo para poder mandarle el dni al otroa ction

        echo '<div class="mb-3">';
        echo '<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>';
        echo '</div>';

        echo '<div class="mb-3">';
        echo '<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>';
        echo '</div>';

        echo '<div class="mb-3">';
        echo '<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>';
        echo '</div>';

        echo '<div class="mb-3">';
        echo '<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" required>';
        echo '</div>';

        echo '<div class="mb-3">';
        echo '<input type="date" class="form-control" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento" required>';
        echo '</div>';

        echo '<input type="submit" class="btn btn-primary"></input>';
        echo '<input type="reset" class="btn btn-secondary"></input>';

        echo '</form>';
        echo '</div>';
    } else {
        echo '<div id="main">';

        echo ">Ese DNI no se encuentra en la base de datos.<br>";
        echo '<a href="../../../TP4/ejercicio_6.php">>Formulario para agregar la persona al sistema</a>';
        echo '</div>';

    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</body>

</html>