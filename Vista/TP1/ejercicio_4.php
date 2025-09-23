<!DOCTYPE html>
<!-- Ejercicio 4
Modificar el formulario del ejercicio anterior para que usando la edad solicitada, enviar
esos datos a otra página en donde se muestren mensajes distintos dependiendo si la
persona es mayor de edad o no; (si la edad es mayor o igual a 18).
Enviar los datos usando el método GET y luego probar de modificar los datos
directamente en la url para ver los dos posibles mensajes. -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP1/style_ej4.css">
    <title>Document</title>
</head>

<body>
<?php include_once '../Estructura/header.php'; ?>
    <form action="../Action/TP1/actionEj4.php" method="get" onsubmit="return validar()">
        <label>Nombre:</label> <br>
        <input type="text" name="nombre" id="nombre"> <br>
        <label>Apellido</label> <br>
        <input type="text" name="apellido" id="apellido"> <br>
        <label>Edad</label> <br>
        <input type="text" name="edad" id="edad"> 
        <div id="divError"></div>
        <label>Direccion</label> <br>
        <input type="text" name="direccion" id="direccion"> <br>
        <input type="submit" value="Enviar" id="boton"><br>
<input type="reset" value="Borrar" id="boton">
    </form>


    <script src="../Js/TP1/ej_4.js"></script>
    <?php include_once '../Estructura/footer.php'; ?>

</body>

</html>