<!DOCTYPE html>
<!-- Ejercicio 7
Crear una página con un formulario que contenga dos input de tipo text y un select. En
los inputs se ingresarán números y el select debe dar la opción de una operación
matemática que podrá resolverse usando los números ingresados. En la página que
procesa la información se debe mostrar por pantalla la operación seleccionada, cada
uno de los operandos y el resultado obtenido de resolver la operación. Ejemplo del
formulario: -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP1/style_ej7.css">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php include_once '../Estructura/header.php';?>
<form action="../Action/TP1/actionEj7.php" method="post" onsubmit="return validar()">
    <label>Ingresar dos números y elegir la operación:</label><br>

    <input type="text" name="numA" id="numA" maxlength="3" placeholder="Ej: 5">
    <div id="divError" style="color: red;"></div>

    <input type="text" name="numB" id="numB" maxlength="3" placeholder="Ej: 6">
    <span id="spanError" style="color: red;"></span><br>

    <select name="op" id="op">
        <option value="#">Operación..</option>
        <option value="suma" id="suma">SUMA</option>
        <option value="resta" id="resta">RESTA</option>
        <option value="multiplicacion" id="mult">MULTIPLICACIÓN</option>
        <option value="division" id="division">DIVISIÓN</option>
    </select><br><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
</form>
<?php include_once '../Estructura/footer.php';?>

    <script src="../Js/TP1/ej_7.js"></script>
</body>
</html>