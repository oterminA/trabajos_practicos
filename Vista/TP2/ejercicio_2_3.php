<!DOCTYPE html>
<!-- Ejercicio 3
Crear una página php que contenga un formulario HTML como el que se indica en la
imagen (darle formato con CSS), enviar estos datos por el método Post a otra página php
que los reciba y muestre por pantalla un mensaje como el siguiente: “Hola, yo soy
nombre , apellido tengo edad años y vivo en dirección”, usando la información recibida.
Cambiar el método Post por Get y analizar las diferencias -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP2/styleEj2_3.css">
    <title>Ejercicio 2.3</title>
</head>

<body>
    <?php include_once '../Estructura/header.php';?>
    <form action="../Action/TP2/actionEj2_3.php" method="get" onsubmit="return validar()" id="formulario">
        <label>Nombre:</label> <br>
        <input type="text" name="nombre" id="nombre"> <br>
        <label>Apellido</label> <br>
        <input type="text" name="apellido" id="apellido"> <br>
        <label>Edad</label> <br>
        <input type="text" name="edad" id="edad"> <br>
        <label>Direccion</label> <br>
        <input type="text" name="direccion" id="direccion"> <br>
        <input type="submit" value="Enviar" id="boton"> <br>
        <input type="reset" value="Borrar datos" id="boton">
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="../Js/TP2/ej2_3.js"></script>
    <?php include_once '../Estructura/footer.php';?>

</body>

</html>