<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj6.css">
    <title>Document</title>
</head>

<body>
<?php include_once '../../Estructura/header.php'; ?>

<main>

<?php
/*..Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM */

if ($_POST){
    include_once '../../../Control/TP4/AbmPersona.php';
    $control = new AbmPersona();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNac = $_POST['fechaNac'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $param = ["NroDni" => $dni, "Apellido"=>$apellido, "Nombre"=> $nombre, "fechaNac"=>$fechaNac, "Telefono"=>$telefono, "Domicilio"=>$domicilio];

    //acá me fijo si ya hay alguna persona con ese dni en la bd xq no puede pasar eso
    $existePersona = $control->buscar(['NroDni' => $_POST['dni']]);
    if (is_array($existePersona) && count($existePersona) > 0) {
        echo ">Ese DNI ya está ingresado en el sistema.<br>";
        $cargarPersona = false; //esto lo pongo para que más abajo marque false y no error porque esa var no existe
    } else {
        $cargarPersona = $control->alta($param); //lo normal xra mi es usar directamente cargarObjeto pero es privado entonces por eso uso alta que si usa la otra funcion. Esta linea estaria devolviendo un boolean si se pudo cargar o no
    $mostrarDatos = $control->buscar(null); //esto es para despues poder ver todos los datos con el nuevo cargado
    }


    
}

    if ($cargarPersona){
        echo ">Datos cargados correctamente.<br>";
        echo ">Listado de dueños y vehiculos:<br>";
        if (is_array($mostrarDatos) && count($mostrarDatos) > 0){//para validar que en esa variable hay datos y poder mostrar todas las personas cargadas
            echo "<table border='1' cellpadding='5'>";
            echo "<tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Fecha Nac.</th>
            <th>Teléfono</th>
            <th>Domicilio</th>
          </tr>";
            foreach ($mostrarDatos as $objPersona) {
                echo "<tr>";
                echo "<td>" . $objPersona->getNombre() . "</td>";
                echo "<td>" . $objPersona->getApellido() . "</td>";
                echo "<td>" . $objPersona->getNroDni() . "</td>";
                echo "<td>" . $objPersona->getFechaNac() . "</td>";
                echo "<td>" . $objPersona->getTelefono() . "</td>";
                echo "<td>" . $objPersona->getDomicilio() . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }else{
        echo ">Ocurrió un error al cargar los datos.";
    }
    ?>
    <br><br>
    <a href="../../TP4/ejercicio_6.php">volver al formulario</a>
    <br>
    <a href="../../TP4/ejercicio_7.php">formulario carga vehiculo</a>

</main>

<?php include_once '../../Estructura/footer.php'; ?>
    
</body>
</html>