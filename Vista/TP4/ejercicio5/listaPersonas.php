<?php
// Crear una página "listaPersonas.php" que muestre un listado con las personas que se encuentran cargadas
include_once '../../../Control/TP4/AbmPersona.php';
$control = new AbmPersona();
$arrayPersonas = $control->buscar(null); //segun entiendo esto me traeria a tooooda la gente
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj5.css">
    <title>Document</title>
</head>
<body>
<?php include_once '../../Estructura/header.php' ?>

<div id="divMain">
<?php
if (!is_array($arrayPersonas) || count($arrayPersonas)===0){
    echo ">No hay personas para mostrar.";
}else{
    $i= 1;
    foreach ($arrayPersonas as $objPersona) {
        echo "<br>";
        echo "****Persona N° $i****<br>";
        echo ">Nombre: " . $objPersona->getNombre() . "<br>" .
        ">Apellido: " . $objPersona->getApellido() . "<br>" .
        ">Dni: " . $objPersona->getNroDni() . "<br>" .
        ">Fecha nacimiento: " . $objPersona->getFechaNac() . "<br>" .
        ">Telefono: " . $objPersona->getTelefono() . "<br>" .
        ">Domicilio: " . $objPersona->getDomicilio() . "<br>" ;
        $i++;
    }
}
?>
<br>
<a href="../../TP4/ejercicio5/ejercicio_5.php" id="link">volver</a>    
</div>
<?php include_once '../../Estructura/footer.php' ?>

</body>
</html>